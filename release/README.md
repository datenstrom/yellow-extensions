Release plugin 0.7.4
====================
Create software releases.

<p align="center"><img src="release-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/release.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `release.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to create a plugin or theme?

Create a repository for each plugin/theme. The name of your repository should be `yellow-plugin-xyz` or `yellow-theme-xyz`. Your code doesn't have to be perfect, but make sure it works in the [developer kit](https://github.com/datenstrom/yellow-developers). Then fork the official repository `yellow-plugins` or `yellow-themes`. Add your repository to the file `README.md` and send a pull request. 

## How to release a plugin or theme?

Increase the version number in your code. Then create a software release at the [command line](https://github.com/datenstrom/yellow-plugins/tree/master/command). Open a terminal window. Go to your installation folder, where the `yellow.php` is. Type `php yellow.php release` followed by the directory of your repository. This will update all necessary files. Upload the changes and send a pull request.

## How to configure a software release?

The following settings can be configured in file `system/config/config.ini`:

`ReleasePluginsDir` = directory containing the official plugins repository  
`ReleaseThemesDir` = directory containing the official themes repository  

The following settings can be configured in file `update.ini`:

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

Creating a software release at the command line:

`php yellow.php release`  
`php yellow.php release /Users/steffen/Documents/GitHub/yellow-plugin-example/`  
`php yellow.php release /Users/steffen/Documents/GitHub/yellow-theme-example/`  

Settings for a plugin:

~~~
# Datenstrom Yellow update

Plugin: YellowExample
Version: 0.7.1
Published: 2018-07-09 19:42:13
Developer: Datenstrom

YellowExample/example.php: system/plugins/example.php,create,update
YellowExample/example.js: system/plugins/example.js,create,update
YellowExample/example.css: system/plugins/example.css,create,update
~~~

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
