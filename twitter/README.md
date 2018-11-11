Twitter plugin 0.7.9
====================
Embed Twitter messages. [See demo](https://developers.datenstrom.se/plugins/twitter).

<p align="center"><img src="twitter-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/twitter.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `twitter.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to embed a message

Create a `[twitter]` shortcut. 

The following arguments are available, all but the first argument are optional:
 
`Id` = last part of a [Twitter](https://www.twitter.com) link, e.g. `https://twitter.com/datenstromse/status/581449759493398528`  
`Theme` = message theme, e.g. `light`, `dark`  
`Style` = message style, e.g. `left`, `center`, `right`  
`Width` = message width, pixel or percent  
`Height` = message height, pixel or percent  

## Example

Embedding a tweet:

    [twitter 581449759493398528]
    [twitter 581449759493398528 dark]
    [twitter 581449759493398528 light right]

Embedding a timeline:

    [twitter datenstromse]
    [twitter datenstromse/likes]
    [twitter datenstromse/likes light - 250 250]

Embedding a follow button:

    [twitterfollow datenstromse]

## Developer

Datenstrom and Steffen Schultz. [Get support](https://developers.datenstrom.se/help/support).
