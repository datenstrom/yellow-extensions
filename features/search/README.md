Search 0.8.2
============
Full-text search. [See demo](https://developers.datenstrom.se/features/search).

<p align="center"><img src="search-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/search.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `search.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to use a search

The search is available on your website as `http://website/search/`. It searches trough content of the entire website, only visible pages are included. You can use a custom navigation, open file `system/settings/system.ini` and change `Navigation: navigation-search`. To show a search field add a `[search]` shortcut with optional location. You can also add a link to the search somewhere on your website. See example below.

## How to configure a search

The following settings can be configured in file `system/settings/system.ini`:

`SearchLocation` = search location  
`SearchPaginationLimit` = number of entries to show per page  
`SearchPageLength` = maximum page length to show  

## Example

Adding a search field:

    [search]
    [search /en/search/]
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

Footer file with search page:

    ---
    Title: Footer
    Status: hidden
    ---
    [Search](/search/) &nbsp; 
    [Made with Datenstrom Yellow](https://datenstrom.se/yellow/)

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
