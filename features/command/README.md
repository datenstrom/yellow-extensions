Command 0.8.3
=============
Run commands in a terminal window.

<p align="center"><img src="command-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/command.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `command.zip` into your `system/extensions` folder.

Do not delete the [extension files](extension.ini), they are always required.

## How to use commands

You can run commands from within the installation folder. Open a terminal window. Go to your installation folder, where the `yellow.php` is. Type `php yellow.php` followed by more arguments. To show available commands enter no arguments. You can create a static website and do much more at the command line. See commands below.

The extension uses the [cURL library](https://github.com/curl/curl) by Daniel Stenberg to check links.

## Commands

The following commands are available:

`php yellow.php about` = Show [website version](https://github.com/datenstrom/yellow-extensions/tree/master/features/core)  
`php yellow.php build` = Build [static website](https://developers.datenstrom.se/help/server-configuration#static-website)  
`php yellow.php check` = Check [static website](https://developers.datenstrom.se/help/server-configuration#static-website) for broken links  
`php yellow.php clean` = Clean [static website](https://developers.datenstrom.se/help/server-configuration#static-website)  
`php yellow.php install` = Add extensions with the [update extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/update)  
`php yellow.php release` = Create releases with the [release extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/release)  
`php yellow.php serve` = Start [built-in web server](https://developers.datenstrom.se/help/server-configuration#static-website) for testing the website  
`php yellow.php traffic` = Create traffic analytics with the [traffic extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/traffic)  
`php yellow.php uninstall` = Remove extensions with the [update extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/update)  
`php yellow.php update` = Update website with the [update extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/update)  
`php yellow.php user` = Update user account with the [edit extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/edit)  

## Example

Showing available commands:

`php yellow.php`

~~~~
Datenstrom Yellow is for people who make websites.
Syntax: php yellow.php about
        php yellow.php build [directory location]
        php yellow.php check [directory location]
        php yellow.php clean [directory location]
        php yellow.php install [extension]
        php yellow.php release [directory]
        php yellow.php serve [url]
        php yellow.php traffic [days location filename]
        php yellow.php uninstall [extension]
        php yellow.php update [extension]
        php yellow.php user [option email password name]
~~~~

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
