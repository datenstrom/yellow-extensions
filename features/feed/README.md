Feed 0.8.2
==========
Web feed with recent changes. [See demo](https://developers.datenstrom.se/feed/).

<p align="center"><img src="feed-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/feed.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `feed.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to use a feed

The feed is available on your website as `http://website/feed/` and `http://website/feed/page:feed.xml`. It's a feed for the entire website, only visible pages are included. To make a blog feed open file `system/settings/system.ini` and change `FeedFilter: blog`. You can add a link to the feed somewhere on your website. See example below.

## How to configure a feed

The following settings can be configured in file `system/settings/system.ini`:

`FeedLocation` = feed location  
`FeedFileXml` = feed file name for RSS feed  
`FeedFilter` = feed filter for a specific layout  
`FeedPaginationLimit` = number of entries to show per page  

## Example

Footer file with RSS feed:

    ---
    Title: Footer
    Status: hidden
    ---
    [Feed](/feed/page:feed.xml) &nbsp; 
    [Made with Datenstrom Yellow](https://datenstrom.se/yellow/)

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
