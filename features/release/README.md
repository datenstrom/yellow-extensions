Release 0.8.5
=============
Create releases.

<p align="center"><img src="release-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/release.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `release.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to create a release

First increase the version number in your code. Then create a release at the [command line](https://github.com/datenstrom/yellow-extensions/tree/master/features/command). Open a terminal window. Go to your installation folder, where the `yellow.php` is. Type `php yellow.php release`, you can optionally add a directory. This will update all necessary files. Upload the changes and send a pull request. See example below.

## How to configure a release

The following settings can be configured in file `system/settings/system.ini`:

`ReleaseExtensionDir` = directory containing the official extensions repository  
`ReleaseRepositoryDir` = directory containing your repositories   

The following settings can be configured in file `extension.ini` for each extension:

`Extension` = name of extension  
`Version` = version number of extension  
`Description` = description of extension  
`Published` = publication date of extension  
`Developer` = feature developer  
`Translator` = language translator  
`Designer` = theme designer  

The following file operations are supported:

`create` = create if not exists  
`update` = overwrite if exists  
`delete` = delete if exists  
`careful` = only if not modified  
`optional` = only if new installation  

## Example

Creating releases at the command line:

`php yellow.php release`   
`php yellow.php release yellow-example`  
`php yellow.php release yellow-city`  

Update settings for a feature:

~~~
# Datenstrom Yellow extension

Extension: Example
Version: 0.8.3
Description: Example feature for developers.
Published: 2019-01-24 19:42:13
Developer: Anna Svensson

system/extensions/example.php: Example,example.php,create,update
~~~

Update settings for a theme:

~~~
# Datenstrom Yellow extension

Extension: City
Version: 0.8.3
Description: Example theme for designers.
Published: 2019-01-24 19:42:13
Designer: Anna Svensson

system/extensions/city.php: City,city.php,create,update
system/resources/city.css: City,city.css,create,update,careful
system/resources/city-icon.png: City,city-icon.png,create
~~~

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
