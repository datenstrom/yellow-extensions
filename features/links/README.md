Links 0.8.2
===========
Show links to previous/next page. [See demo](https://developers.datenstrom.se/features/blog/blog-example).

<p align="center"><img src="links-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download and install blog extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/blog).
3. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/links.zip). If you are using Safari, right click and select 'Download file as'.
4. Copy `links.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to show links

The extension adds links to previous/next page, which allows users to navigate between pages. Links are shown on blog and wiki pages. To show links on other pages add a `[links]` shortcut to a page.

## How to configure links

The following settings can be configured in file `system/settings/system.ini`:

`LinksPagePrevious` = show link to previous page, 1 or 0  
`LinksPageNext` = show link to next page, 1 or 0  
`LinksStyle` = links style, e.g. `entry-links`, `simple`    

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
