![snipe-it-by-grok](https://github.com/snipe/snipe-it/assets/197404/b515673b-c7c8-4d9a-80f5-9fa58829a602)

[![Crowdin](https://d322cqt584bo4o.cloudfront.net/snipe-it/localized.svg)](https://crowdin.com/project/snipe-it) [![Docker Pulls](https://img.shields.io/docker/pulls/snipe/snipe-it.svg)](https://hub.docker.com/r/snipe/snipe-it/) [![Twitter Follow](https://img.shields.io/twitter/follow/snipeitapp.svg?style=social)](https://twitter.com/snipeitapp) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/553ce52037fc43ea99149785afcfe641)](https://www.codacy.com/app/snipe/snipe-it?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=snipe/snipe-it&amp;utm_campaign=Badge_Grade) [![Tests](https://github.com/snipe/snipe-it/actions/workflows/tests.yml/badge.svg)](https://github.com/snipe/snipe-it/actions/workflows/tests.yml)
[![All Contributors](https://img.shields.io/badge/all_contributors-331-orange.svg?style=flat-square)](#contributing) [![Discord](https://badgen.net/badge/icon/discord?icon=discord&label)](https://discord.gg/yZFtShAcKk)

## Snipe-IT - Open Source Asset Management System

This is a FOSS project for asset management in IT Operations. Knowing who has which laptop, when it was purchased in order to depreciate it correctly, handling software licenses, etc.

It is built on [Laravel 8](http://laravel.com).

Snipe-IT is actively developed and we [release quite frequently](https://github.com/snipe/snipe-it/releases). ([Check out the live demo here](https://snipeitapp.com/demo/).)

> [!TIP]
> __This is web-based software__. This means there is no executable file (aka no .exe files), and it must be run on a web server and accessed through a web browser. It runs on any Mac OSX, flavor of Linux, as well as Windows, and we have a [Docker image](https://snipe-it.readme.io/docs/docker) available if that's what you're into.

-----

### Installation

For instructions on installing and configuring Snipe-IT on your server, check out the [installation manual](https://snipe-it.readme.io/docs). (Please see the [requirements documentation](https://snipe-it.readme.io/docs/requirements) for full requirements.)

If you're having trouble with the installation, please check the [Common Issues](https://snipe-it.readme.io/docs/common-issues) and [Getting Help](https://snipe-it.readme.io/docs/getting-help) documentation, and search this repository's open *and* closed issues for help.

<!-- [![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy) -->

-----
### User's Manual
For help using Snipe-IT, check out the [user's manual](https://snipe-it.readme.io/docs/overview).

-----
### Bug Reports & Feature Requests

Feel free to check out the [GitHub Issues for this project](https://github.com/snipe/snipe-it/issues) to open a bug report or see what open issues you can help with. Please search through existing issues (open *and* closed) to see if your question has already been answered before opening a new issue.

> [!IMPORTANT]  
> **PLEASE see the [Getting Help Guidelines](https://snipe-it.readme.io/docs/getting-help) and [Common Issues](https://snipe-it.readme.io/docs/common-issues) before opening a ticket, and be sure to complete all of the questions in the Github Issue template to help us to help you as quickly as possible.**
> 
-----

### Upgrading

Please see the [upgrading documentation](https://snipe-it.readme.io/docs/upgrading) for instructions on upgrading Snipe-IT.

------
### Announcement List

To be notified of important news (such as new releases, security advisories, etc), [sign up for our list](http://eepurl.com/XyZKz). We'll never sell or give away your info, and we'll only email you when it's important.

------

### Translations!

Please see the [translations documentation](https://snipe-it.readme.io/docs/translations) for information about available languages and how to add translations to Snipe-IT.

-----

### Libraries, Modules & Related Projects

Since the release of the JSON REST API, several third-party developers have been developing modules and libraries to work with Snipe-IT.  

> [!NOTE]  
> As these were created by third-parties, Snipe-IT cannot provide support for these project, and you should contact the developers directly if you need assistance. Additionally, Snipe-IT makes no guarantees as to the reliability, accuracy or maintainability of these libraries. Use at your own risk. :)

- [Python Module](https://github.com/jbloomer/SnipeIT-PythonAPI) by [@jbloomer](https://github.com/jbloomer)
- [SnipeSharp - .NET module in C#](https://github.com/barrycarey/SnipeSharp) by [@barrycarey](https://github.com/barrycarey)
- [InQRy -unmaintained-](https://github.com/Microsoft/InQRy) by [@Microsoft](https://github.com/Microsoft)
- [SnipeitPS](https://github.com/snazy2000/SnipeitPS) by [@snazy2000](https://github.com/snazy2000) - Powershell API Wrapper for Snipe-it
- [jamf2snipe](https://github.com/grokability/jamf2snipe) - Python script to sync assets between a JAMFPro instance and a Snipe-IT instance
- [jamf-snipe-rename](https://macblog.org/jamf-snipe-rename/) - Python script to rename computers in Jamf from Snipe-IT
- [Marksman](https://github.com/Scope-IT/marksman) - A Windows agent for Snipe-IT
- [Snipe-IT plugin for Jira Service Desk](https://marketplace.atlassian.com/apps/1220964/snipe-it-for-jira)
- [Python 3 CSV importer](https://github.com/gastamper/snipeit-csvimporter) - allows importing assets into Snipe-IT based on Item Name rather than Asset Tag.
- [Snipe-IT Kubernetes Helm Chart](https://github.com/t3n/helm-charts/tree/master/snipeit) - For more information, [click here](https://hub.helm.sh/charts/t3n/snipeit).
- [Snipe-IT Bulk Edit](https://github.com/bricelabelle/snipe-it-bulkedit) - Google Script files to use Google Sheets as a bulk checkout/checkin/edit tool for Snipe-it.
- [MosyleSnipeSync](https://github.com/RodneyLeeBrands/MosyleSnipeSync) by [@Karpadiem](https://github.com/Karpadiem) - Python script to synchronize information between Mosyle and Snipe-IT
- [WWW::SnipeIT](https://github.com/SEDC/perl-www-snipeit) by [@SEDC](https://github.com/SEDC) - perl module for accessing the API
- [UniFi to Snipe-IT](https://github.com/RodneyLeeBrands/UnifiSnipeSync) by [@karpadiem](https://github.com/karpadiem) - Python script that synchronizes UniFi devices with Snipe-IT.
- [Kandji2Snipe](https://github.com/grokability/kandji2snipe) by [@briangoldstein](https://github.com/briangoldstein) - Python script that synchronizes Kandji with Snipe-IT.
- [SnipeAgent](https://github.com/ReticentRobot/SnipeAgent) by @ReticentRobot - Windows agent for Snipe-IT

-----

### Contributing

Please see the documentation on [contributing and developing for Snipe-IT](https://snipe-it.readme.io/docs/contributing-overview).

Please note that this project is released with a [Contributor Code of Conduct](CODE_OF_CONDUCT.md). By participating in this project you agree to abide by its terms.

The ERD is available [online here](https://drawsql.app/templates/snipe-it).

[Here is a list](CONTRIBUTORS.md) of the wonderful people that have contributed to the Snipe-IT.

-----

### Security

> [!IMPORTANT]
> **To report a security vulnerability, please email security@snipeitapp.com instead of using the issue tracker.**
