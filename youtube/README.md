Youtube plugin 0.7.2
====================
Embed Youtube videos. [See demo](https://developers.datenstrom.se/plugins/youtube).

<p align="center"><img src="youtube-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/youtube.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `youtube.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to embed a video

Create a `[youtube]` shortcut. 

The following arguments are available, all but the first argument are optional:
 
`Id` = last part of a [Youtube](https://www.youtube.com) link, e.g. `https://www.youtube.com/watch?v=fhs55HEl-Gc`  
`Style` = video style, e.g. `left`, `center`, `right`  
`Width` = video width, pixel or percent  
`Height` = video height, pixel or percent   
 
## Example

Embedding a video:

    [youtube fhs55HEl-Gc]
    [youtube fhs55HEl-Gc left 200 112]
    [youtube fhs55HEl-Gc right 200 112]

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
