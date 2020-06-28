Command 0.8.15
==============
Run commands in a terminal window.

<p align="center"><img src="command-screenshot.png?raw=true" width="794" height="478" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/command.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `command.zip` into your `system/extensions` folder.

Please do not delete the [extension files](extension.ini), they are always required.

## How to build a static website

Build a static website that works on most web servers. Open a terminal window. Go to your installation folder, where the `yellow.php` is. Type `php yellow.php build`, you can optionally add a folder and a location. This will build a static website in the `public` folder. Upload the static website to your web server and build a new one when needed. To check for broken links type: `php yellow.php check`. To clean the static website type the following: `php yellow.php clean`.

## How to build a static cache

You can speed up your website with a static cache. This improves loading time, but the cache needs to be updated repeatedly. Open a terminal window. Go to your installation folder, where the `yellow.php` is. Type `php yellow.php build cache`, you can optionally add a location. To clean the cache type following: `php yellow.php clean cache`.

## How to start the built-in web server

You can test your website with the built-in web server. This is handy for developers, since everything runs on your own computer. Open a terminal window. Go to your installation folder, where the `yellow.php` is. Type `php yellow.php serve`, you can optionally add a folder and a URL. Open a web browser and go to `http://localhost:8000/`.

## Commands

The following commands are available:

`php yellow.php about` = Show website version  
`php yellow.php build` = Build static website    
`php yellow.php check` = Check static website  
`php yellow.php clean` = Clean static website  
`php yellow.php install` = Add extensions with the [update extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/update)  
`php yellow.php release` = Publish extensions with the [release extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/release)  
`php yellow.php serve` = Start built-in web server  
`php yellow.php traffic` = Create traffic analytics with the [traffic extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/traffic)  
`php yellow.php uninstall` = Remove extensions with the [update extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/update)  
`php yellow.php update` = Update website with the [update extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/update)  
`php yellow.php user` = Update user accounts with the [edit extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/edit)  

This extension uses the [cURL library](https://github.com/curl/curl) by Daniel Stenberg.

## Examples

Showing available commands:

`php yellow.php`

~~~~
Datenstrom Yellow is for people who make small websites.
Syntax: php yellow.php about
        php yellow.php build [directory location]
        php yellow.php check [directory location]
        php yellow.php clean [directory location]
        php yellow.php install [extension]
        php yellow.php release [directory]
        php yellow.php serve [directory url]
        php yellow.php traffic [days location filename]
        php yellow.php uninstall [extension]
        php yellow.php update [extension]
        php yellow.php user [option email password name]
~~~~

Building static website at the command line:

`php yellow.php build`  
`php yellow.php build public /blog/`  
`php yellow.php build public /wiki/`  

Checking static website for broken links at the command line:

`php yellow.php check`  
`php yellow.php check public /blog/`  
`php yellow.php check public /wiki/`  

Start built-in web server at the command line:

`php yellow.php serve`  
`php yellow.php serve public http://localhost:8008/`  
`php yellow.php serve dynamic http://localhost:8008/`  

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
