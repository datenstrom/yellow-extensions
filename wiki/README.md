Wiki plugin 0.7.2
=================
Wiki for your website. [See demo](https://developers.datenstrom.se/plugins/wiki/).

<p align="center"><img src="wiki-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/wiki.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `wiki.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

## How to use a wiki?

The wiki is available on your website as `http://website/wiki/`. To show the wiki on the home page, go to your `content` folder and delete the `1-home` folder. To create a new wiki page, add a new file to the wiki folder. Set `Title` and other [settings](https://developers.datenstrom.se/help/markdown-cheat-sheet#settings) at the top of a page. Use `Tag` to group similar pages together. [Learn more](https://developers.datenstrom.se/help/how-to-make-a-wiki).

## How to configure a wiki?

You can use shortcuts to show information about the wiki:

`[wikiauthors LOCATION PAGESMAX]` for a list of authors  
`[wikipages LOCATION PAGESMAX]` for a list of pages  
`[wikirecent LOCATION PAGESMAX]` for recently changed pages  
`[wikirelated LOCATION PAGESMAX]` for related pages to current page  
`[wikitags LOCATION PAGESMAX]` for a list of tags  

The following arguments are available, all but the first argument are optional:

`LOCATION` = wiki location  
`PAGESMAX` = number of pages, 0 for unlimited  

The following settings can be configured in file `system/config/config.ini`:

`WikiLocation` = wiki location  
`WikiNewLocation` = wiki location for new page  
`WikiPagesMax` = number of pages  
`WikiPaginationLimit` = number of entries to show per page  

## Example

Showing recently changed pages:

    [wikirecent /wiki/]
    [wikirecent /wiki/ 5]
    [wikirecent /wiki/ 20]

Showing list of tags:

    [wikitags /wiki/]
    [wikitags /wiki/ 5]
    [wikitags /wiki/ 20]

Showing list of pages:

    [wikipages /wiki/ 0]
    [wikipages /wiki/ 25]
    [wikipages /wiki/ 50]

## Developer

Datenstrom
