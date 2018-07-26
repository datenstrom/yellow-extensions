Release plugin 0.7.9
====================
Create software releases.

<p align="center"><img src="release-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/release.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `release.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to release a plugin or theme

First increase the version number in your code. Then create a software release at the [command line](https://github.com/datenstrom/yellow-plugins/tree/master/command). Open a terminal window. Go to your installation folder, where the `yellow.php` is. Type `php yellow.php release`, you can optionally add a directory. This will update all necessary files. Upload the changes and send a pull request. See example below.

## How to configure a software release

The following settings can be configured in file `system/config/config.ini`:

`ReleaseSoftwareDir` = directory containing your repositories   
`ReleasePluginsDir` = directory containing the official plugins repository  
`ReleaseThemesDir` = directory containing the official themes repository  

The following settings can be configured in file `update.ini` for each plugin/theme:

`Plugin` or `Theme` = software name  
`Version` = software version number  
`Published` = software publication date  
`Developer` = plugin developer  
`Designer` = theme designer  

The following file operations are supported:

`create` = create if not exists  
`update` = overwrite if exists  
`delete` = delete if exists  
`careful` = only if not modified  
`optional` = only if new software installation  

## Example

Creating software releases at the command line:

`php yellow.php release`   
`php yellow.php release yellow-plugin-example`  
`php yellow.php release yellow-theme-example`  

Settings for a plugin:

~~~
# Datenstrom Yellow update

Plugin: YellowExample
Version: 0.7.1
Published: 2018-07-09 19:42:13
Developer: Datenstrom

YellowExample/example.php: system/plugins/example.php,create,update
~~~

Settings for a theme:

~~~
# Datenstrom Yellow update

Theme: YellowThemeExample
Version: 0.7.1
Published: 2018-07-09 19:42:13
Designer: Anna Svensson

YellowThemeExample/example.php: system/themes/assets/example.php,create,update
YellowThemeExample/example.css: system/themes/assets/example.css,create,update,careful
YellowThemeExample/example-logo.png: system/themes/assets/example-logo.png,create
~~~

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
