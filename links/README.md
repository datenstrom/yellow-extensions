Links plugin 0.7.1
==================
Add links to previous/next page. [See demo](https://developers.datenstrom.se/plugins/blog-plugin/blog-example).

<p align="center"><img src="links-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download and install blog plugin](https://github.com/datenstrom/yellow-plugins/tree/master/blog).
3. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/links.zip). If you are using Safari, right click and select 'Download file as'.
4. Copy `links.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

## How to show links?

The plugin adds links to previous/next page, which allows users to navigate between pages. Links are shown on blog and wiki pages. To show links on other pages add a `[links]` shortcut to a page.

## How to configure links?

The following settings can be configured in file `system/config/config.ini`:

`LinksPagePrevious` = show link to previous page, 1 or 0  
`LinksPageNext` = show link to next page, 1 or 0  
`LinksStyle` = links style, e.g. `entry-links`, `simple`    

## Developer

Datenstrom
