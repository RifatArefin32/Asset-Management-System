<?php

namespace App\View;

use App\Models\Labels\Field;
use App\Models\Labels\Label as LabelModel;
use App\Models\Labels\Sheet;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Traits\Macroable;
use TCPDF;

class Label implements View
{
    use Macroable { __call as macroCall; }

    protected const NAME = 'label';

    /**
     * A Collection of passed data.
     *
     * @var Collection
     */
    protected $data;

    public function __construct() {
        $this->data = new Collection();
    }

    /**
     * Render the PDF label.
     *
     * @param  callable|null  $callback
     */
    public function render(callable $callback = null)
    {
        $settings = $this->data->get('settings');
        $assets = $this->data->get('assets');
        $offset = $this->data->get('offset');
        $template = LabelModel::find($settings->label2_template);

        // If disabled, pass to legacy view
        if ((!$settings->label2_enable)) {
            return view('hardware/labels')
                ->with('assets', $assets)
                ->with('settings', $settings)
                ->with('bulkedit', $this->data->get('bulkedit'))
                ->with('count', $this->data->get('count'));
        }

        $template->validate();

        $pdf = new TCPDF(
            $template->getOrientation(),
            $template->getUnit(),
            [ $template->getWidth(), $template->getHeight() ]
        );

        // Reset parameters
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetMargins(0, 0, null, true);
        $pdf->SetCellMargins(0, 0, 0, 0);
        $pdf->SetCellPaddings(0, 0, 0, 0);
        $pdf->setCreator('Snipe-IT');
        $pdf->SetSubject('Asset Labels');
        $template->preparePDF($pdf);

        // Get fields from settings
        $fieldDefinitions = collect(explode(';', $settings->label2_fields))
            ->filter(fn($fieldString) => !empty($fieldString))
            ->map(fn($fieldString) => Field::fromString($fieldString));

        // Prepare data
        $data = $assets
            ->map(function ($asset) use ($template, $settings, $fieldDefinitions) {

                $assetData = new Collection();

                $assetData->put('asset', $asset);
                $assetData->put('id', $asset->id);
                $assetData->put('tag', $asset->asset_tag);

                if ($template->getSupportTitle() && !empty($settings->label2_title)) {
                    $title = str_replace('{COMPANY}', data_get($asset, 'company.name'), $settings->label2_title);
                    $assetData->put('title', $title);
                }

                if ($template->getSupportLogo()) {

                    $logo = null;

                    // Should we use the assets assigned company logo? (A.K.A. "Is `Labels > Use Asset Logo` enabled?"), and do we have a company logo?
                    if ($settings->label2_asset_logo && $asset->company && $asset->company->image!='') {
                        $logo = Storage::disk('public')->path('companies/'.e($asset->company->image));
                    } elseif (!empty($settings->label_logo)) {
                        // Use the general site label logo, if available
                        $logo = Storage::disk('public')->path('/'.e($settings->label_logo));
                    }

                    if (!empty($logo)) {
                        $assetData->put('logo', $logo);
                    }
                }

                if ($settings->alt_barcode_enabled) {
                    if ($template->getSupport1DBarcode()) {
                        $barcode1DType = $settings->alt_barcode;
                        if ($barcode1DType != 'none') {
                            $assetData->put('barcode1d', (object)[
                                'type' => $barcode1DType,
                                'content' => $asset->asset_tag,
                            ]);
                        }
                    }
                }

                if ($template->getSupport2DBarcode()) {
                    $barcode2DType = $settings->label2_2d_type;
                    $barcode2DType = ($barcode2DType == 'default') ? 
                        $settings->barcode_type :
                        $barcode2DType;
                    if (($barcode2DType != 'none') && (!is_null($barcode2DType))) {
                        switch ($settings->label2_2d_target) {
                            case 'ht_tag': $barcode2DTarget = route('ht/assetTag', $asset->asset_tag); break;
                            case 'hardware_id':
                            default: $barcode2DTarget = route('hardware.show', ['hardware' => $asset->id]); break;
                        }
                        $assetData->put('barcode2d', (object)[
                            'type' => $barcode2DType,
                            'content' => $barcode2DTarget,
                        ]);
                    }
                }

                $fields = $fieldDefinitions
                    ->map(fn($field) => $field->toArray($asset))
                    ->filter(fn($field) => $field != null)
                    ->reduce(function($myFields, $field) {
                        // Remove Duplicates
                        $toAdd = $field
                            ->filter(fn($o) => !$myFields->contains('dataSource', $o['dataSource']))
                            ->first();

                        return $toAdd ? $myFields->push($toAdd) : $myFields;
                    }, new Collection());

                $assetData->put('fields', $fields->take($template->getSupportFields()));

                return $assetData;
            });
        
        if ($template instanceof Sheet) {
            $template->setLabelIndexOffset($offset ?? 0);
        }
        $template->writeAll($pdf, $data);

        $filename = $assets->count() > 1 ? 'assets.pdf' : $assets->first()->asset_tag.'.pdf';
        $pdf->Output($filename, 'I');
    }

    /**
     * Add a piece of data.
     *
     * @param  string|array  $key
     * @param  mixed  $value
     * @return $this
     */
    public function with($key, $value = null)
    {
        $this->data->put($key, $value);
        return $this;
    }
    
    /**
     * Get the array of view data.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the name of the view.
     *
     * @return string
     */
    public function name()
    {
        return $this->getName();
    }

    /**
     * Get the name of the view.
     *
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }

}
