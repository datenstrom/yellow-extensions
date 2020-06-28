Search 0.8.6
============
Full-text search.

<p align="center"><img src="search-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/search.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `search.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to use a search

The search is available on your website as `http://website/search/`. It searches trough content of the entire website, only visible pages are included. To show a search field add a `[search]` shortcut. You can also add a link to the search somewhere on your website.

## Settings

The following settings can be configured in file `system/settings/system.ini`:

`SearchLocation` = search location  
`SearchPaginationLimit` = number of entries to show per page  
`SearchPageLength` = maximum page length to show  

The following files can be configured:

`system/layouts/search.html` = layout file for search  

## Examples

Searching a website:

    coffee
    milk sugar
    "milk and sugar"

Searching a website, different filters:

    coffee author:datenstrom
    coffee language:en
    coffee tag:example

Adding a search field:

    [search]
    [search /search/]
    [search /de/search/]

Content file with search field:

    ---
    Title: Example page
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [search]

Content file with link to search:

    ---
    Title: Example page
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [Search all pages](/search/). [See recent changes](/search/special:changes/).

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
