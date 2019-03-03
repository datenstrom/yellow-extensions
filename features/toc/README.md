Toc 0.8.2
=========
Table of contents. [See demo](https://developers.datenstrom.se/features/toc).

<p align="center"><img src="toc-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/toc.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `toc.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to make a table of contents

Create a `[toc]` shortcut separated by blank lines.  

## Example

Content file with table of contents:

    ---
    Title: Example page
    ---
    [toc]
    
    ## First header
    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.
    
    ## Second header
    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.
    
    ## Summary
    
    This is an example page.

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
