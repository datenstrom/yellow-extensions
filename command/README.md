Command plugin 0.7.2
=====================
Run commands in a terminal window.

<p align="center"><img src="command-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/command.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `command.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

## How to run a command?

Datenstrom Yellow offers commands that you run from within the installation folder. Open a terminal window. Go to your installation folder, where the `yellow.php` is. Type `php yellow.php` to show a list of the available commands.

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
Update [user account with the edit plugin](https://github.com/datenstrom/yellow-plugins/tree/master/edit)

**php yellow.php version**  
Show software version and updates

## Example

Showing available commands:

`php yellow.php`

~~~~
Datenstrom Yellow 0.7.1
Syntax: yellow.php build [DIRECTORY LOCATION]
        yellow.php clean [DIRECTORY LOCATION]
        yellow.php traffic [DAYS LOCATION FILENAME]
        yellow.php update [OPTION FEATURE]
        yellow.php user [EMAIL PASSWORD NAME LANGUAGE]
        yellow.php version
~~~~

## Developer

Datenstrom
