Instagram 0.8.4
===============
Embed Instagram photos.

<p align="center"><img src="instagram-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/instagram.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `instagram.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to embed a photo

Create an `[instagram]` shortcut. 

The following arguments are available, all but the first argument are optional:
 
`Id` = middle part of an [Instagram](https://www.instagram.com) link, e.g. `https://www.instagram.com/p/BISN9ngjV2-/?taken-by=rick_ande`  
`Theme` = photo theme, currently `light` only  
`Style` = photo style, e.g. `left`, `center`, `right`  
`Width` = photo width, pixel or percent  
`Height` = photo height, pixel or percent  

## Settings

The following settings can be configured in file `system/settings/system.ini`:

`InstagramStyle` = photo style, e.g. `left`, `center`, `right`  

## Examples

Embedding a photo:

    [instagram BISN9ngjV2-]
    [instagram BISN9ngjV2- light - 500]
    [instagram BISN9ngjV2- light right 500]

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
