Update plugin 0.6.14
===================
Keep your website up to date.

<p align="center"><img src="update-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/update.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `update.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

## How to update a website?

The first option is to update your website in a web browser. Click the edit link on a page. Go to your settings and check for updates. Yellow will show when updates are available. Only the webmaster can update the website. The webmaster's email is defined in file `system/config/config.ini`, for example `Email: email@example.com`.

The second option is to update your website at the [command line](https://github.com/datenstrom/yellow-plugins/tree/master/commandline). Open a terminal window. Go to your Yellow installation, where the `yellow.php` is. Type `php yellow.php update`, you can add an optional option and feature. Deleted files can be found in the `system/trash` folder. See example below.

The plugin uses the [cURL library](https://github.com/bagder/curl) by Daniel Stenberg to download files.

## Example

Updating website at the command line:
 
`php yellow.php update`  
`php yellow.php update force`  
`php yellow.php update force YellowBlog`  

## Developer

Datenstrom
