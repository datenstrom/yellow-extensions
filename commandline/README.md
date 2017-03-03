Commandline plugin 0.6.18
=========================
Run commands in a terminal window.

<p align="center"><img src="commandline-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/commandline.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `commandline.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

## How to run a command?

Yellow offers commands that you run from within a folder containing the Yellow installation. Open a terminal window.  Go to your Yellow installation, where the `yellow.php` is. Type `php yellow.php` to show a list of the available commands.

The following commands are available:

**php yellow.php**  
Show available commands

**php yellow.php build [DIRECTORY LOCATION]**  
Build [static files](https://developers.datenstrom.se/help/web-server-configuration#static-website)

**php yellow.php clean [DIRECTORY LOCATION]**  
Clean [static files](https://developers.datenstrom.se/help/web-server-configuration#static-website)

**php yellow.php traffic [DAYS LOCATION FILENAME]**  
Create [traffic analytics with the traffic plugin](https://github.com/datenstrom/yellow-plugins/tree/master/traffic)

**php yellow.php update [OPTION FEATURE]**  
Update [website with the update plugin](https://github.com/datenstrom/yellow-plugins/tree/master/update)

**php yellow.php user [EMAIL PASSWORD NAME LANGUAGE]**  
Update [user account with the webinterface plugin](https://github.com/datenstrom/yellow-plugins/tree/master/webinterface)

**php yellow.php version**  
Show software version and updates

## Example

Showing available commands:

`php yellow.php`

~~~~
Yellow 0.6.8
Syntax: yellow.php build [DIRECTORY LOCATION]
        yellow.php clean [DIRECTORY LOCATION]
        yellow.php traffic [DAYS LOCATION FILENAME]
        yellow.php update [OPTION FEATURE]
        yellow.php user [EMAIL PASSWORD NAME LANGUAGE]
        yellow.php version
~~~~

## Developer

Datenstrom
