Release 0.8.20
==============
Package and publish extensions.

<p align="center"><img src="release-screenshot.png?raw=true" width="794" height="478" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/release.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `release.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to package an extension

The [update extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/update) takes care of updating websites. Your extension can become part of this process. Get a GitHub account and [fork the official repository](https://github.com/datenstrom/yellow-extensions). Take a look at the [example extension](https://github.com/schulle4u/yellow-extension-example) and [basic extension](https://github.com/schulle4u/yellow-extension-basic). They show you which files and settings are necessary. Please make sure that all extensions follow our coding and documentation standards.

## How to publish an extension

First increase the version number in your PHP code, then create a new release at the [command line](https://github.com/datenstrom/yellow-extensions/tree/master/features/command). Open a terminal window. Go to your installation folder, where the `yellow.php` is. Type `php yellow.php release` followed by a folder. Upload your extension to GitHub and create a [pull request](https://help.github.com/en/github/collaborating-with-issues-and-pull-requests/creating-a-pull-request-from-a-fork) for `datenstrom/yellow-extensions`.

## Settings

The following settings can be configured in file `extension.ini`:

`Extension` = extension name  
`Version` = extension version number  
`Type` = extension type, e.g. `feature`, `language`, `theme`  
`Description` = extension description, one line maximum  
`Published` = extension publication date, YYYY-MM-DD format  
`Language` = extension language(s), comma separated  
`Status` = extension status, [supported status values](#settings-status)    
`Developer` = feature developer  
`Translator` = language translator  
`Designer` = theme designer  

<a id="settings-status"></a>The following extension status values are supported:

`public` = extension is visible in official repository  
`unlisted` = extension is not visible in official repository  
`unreleased` = extension is not available in official repository  

<a id="settings-actions"></a>The following file actions are supported:

`create` = create file if not exists  
`update` = overwrite file if exists  
`delete` = delete file if exists  
`multi-language` = use file from corresponding subfolder, e.g. for content files  
`optional` = only if new installation, e.g. for content files  
`careful` = only if not modified, e.g. for system files  

## Examples

Extension settings for a feature:

~~~
# Datenstrom Yellow extension

Extension: Example
Version: 0.8.3
Type: feature
Description: Example feature for developers.
Published: 2019-01-24 19:42:13
Developer: Anna Svensson

system/extensions/example.php: Example,example.php,create,update
~~~

Extension settings for a language:

~~~
# Datenstrom Yellow extension

Extension: English
Version: 0.8.3
Type: language
Description: English/English with language 'en'.
Published: 2019-01-24 19:42:13
Translator: Anna Svensson

system/extensions/english.php: English,english.php,create,update
system/extensions/english-language.txt: English,english-language.txt,create,update
~~~

Extension settings for a theme:

~~~
# Datenstrom Yellow extension

Extension: Basic
Version: 0.8.3
Type: theme
Description: Example theme for designers.
Published: 2019-01-24 19:42:13
Designer: Anna Svensson

system/extensions/basic.php: Basic,basic.php,create,update
system/resources/basic.css: Basic,basic.css,create,update,careful
system/resources/basic-icon.png: Basic,basic-icon.png,create
~~~

Publishing extensions at the command line:

`php yellow.php release yellow-extension-basic`  
`php yellow.php release yellow-extension-example`  
`php yellow.php release yellow-extensions/languages/english`  

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
