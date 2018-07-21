Instagram plugin 0.7.4
======================
Embed Instagram photos. [See demo](https://developers.datenstrom.se/plugins/instagram).

<p align="center"><img src="instagram-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/instagram.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `instagram.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to embed a photo?

Create an `[instagram]` shortcut. 

The following arguments are available:
 
`ID` = middle part of an [Instagram](https://www.instagram.com) link, e.g. `https://www.instagram.com/p/BISN9ngjV2-/?taken-by=rick_ande`  
`THEME` = photo theme, currently `light` only  
`STYLE` = photo style, e.g. `left`, `center`, `right`  
`WIDTH` = photo width, pixel or percent  
`HEIGHT` = photo height, pixel or percent  

## Example

Embedding a photo:

    [instagram BISN9ngjV2-]
    [instagram BISN9ngjV2- light - 500]
    [instagram BISN9ngjV2- light right 500]

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
