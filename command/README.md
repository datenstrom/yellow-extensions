Command plugin 0.7.14
=====================
Run commands in a terminal window.

<p align="center"><img src="command-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/command.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `command.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to use commands

You can run commands from within the installation folder. Open a terminal window. Go to your installation folder, where the `yellow.php` is. Type `php yellow.php` followed by more arguments. To show available commands enter no arguments. You can create a static website and do much more from the command line. See commands below.

The plugin uses the [cURL library](https://github.com/curl/curl) by Daniel Stenberg to check links.

## Commands

The following commands are available:

`php yellow.php build` = Build [static website](https://developers.datenstrom.se/help/server-configuration#static-website)  
`php yellow.php check` = Check [static website](https://developers.datenstrom.se/help/server-configuration#static-website) for broken links  
`php yellow.php clean` = Clean [static website](https://developers.datenstrom.se/help/server-configuration#static-website)  
`php yellow.php install` = Add features with the [update plugin](https://github.com/datenstrom/yellow-plugins/tree/master/update)  
`php yellow.php release` = Create software releases with the [release plugin](https://github.com/datenstrom/yellow-plugins/tree/master/release)  
`php yellow.php serve` = Start built-in web server for testing the website  
`php yellow.php traffic` = Create traffic analytics with the [traffic plugin](https://github.com/datenstrom/yellow-plugins/tree/master/traffic)  
`php yellow.php uninstall` = Remove features with the [update plugin](https://github.com/datenstrom/yellow-plugins/tree/master/update)  
`php yellow.php update` = Update website with the [update plugin](https://github.com/datenstrom/yellow-plugins/tree/master/update)  
`php yellow.php user` = Update user account with the [edit plugin](https://github.com/datenstrom/yellow-plugins/tree/master/edit)  
`php yellow.php version` = Show software version and updates  

## Example

Showing available commands:

`php yellow.php`

~~~~
Datenstrom Yellow is for people who make websites.
Syntax: php yellow.php build [directory location]
        php yellow.php check [directory location]
        php yellow.php clean [directory location]
        php yellow.php install [feature]
        php yellow.php release [directory]
        php yellow.php serve [url]
        php yellow.php traffic [days location filename]
        php yellow.php uninstall [feature]
        php yellow.php update [feature]
        php yellow.php user [option email password name]
        php yellow.php version
~~~~

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
