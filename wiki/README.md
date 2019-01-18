Wiki plugin 0.7.8
=================
Wiki for your website. [See demo](https://developers.datenstrom.se/plugins/wiki/).

<p align="center"><img src="wiki-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/wiki.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `wiki.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to use a wiki

The wiki is available on your website as `http://website/wiki/`. To show the wiki on the home page, go to your `content` folder and delete the `1-home` folder. To create a new wiki page, add a new file to the wiki folder. Set `Title` and other [settings](https://developers.datenstrom.se/help/markdown-cheat-sheet#settings) at the top of a page. Use `Tag` to group similar pages together. [Learn more](https://developers.datenstrom.se/help/how-to-make-a-wiki).

## How to show wiki information

You can use shortcuts to show information about the wiki:

`[wikiauthors]` for a list of authors  
`[wikitags]` for a list of tags  
`[wikirelated]` for a list of pages, related to the current page    
`[wikipages]` for a list of pages, alphabetic order  
`[wikichanges]` for a list of pages, modified order  

The following arguments are available, all but the first argument are optional:

`Location` = wiki location  
`PagesMax` = number of pages, 0 for unlimited  
`Author` = show pages by a specific author, `[wikipages]` or `[wikichanges]` only  
`Tag` = show pages with a specific tag, `[wikipages]` or `[wikichanges`] only  

## How to configure a wiki

The following settings can be configured in file `system/config/config.ini`:

`WikiLocation` = wiki location  
`WikiNewLocation` = wiki location for new page  
`WikiPagesMax` = number of pages  
`WikiPagesMain` = include wiki main page in pages, 1 or 0  
`WikiPaginationLimit` = number of entries to show per page  

The following files can be configured:

`system/config/page-new-wiki.md` = content file for new wiki page  
`system/themes/snippets/content-wiki.php` = source code for wiki page  
`system/themes/snippets/content-wikipages.php` = source code for wiki main page  

## Example

Showing latest wiki pages:

    [wikichanges /wiki/]
    [wikichanges /wiki/ 5]
    [wikichanges /wiki/ 20]

Showing list of tags:

    [wikitags /wiki/]
    [wikitags /wiki/ 5]
    [wikitags /wiki/ 20]

Showing list of pages:

    [wikipages /wiki/]
    [wikipages /wiki/ 5]
    [wikipages /wiki/ 20 - example]

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
