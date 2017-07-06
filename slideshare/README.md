Slideshare plugin 0.6.1
=======================
Embed Slideshare presentations. [See demo](https://developers.datenstrom.se/plugins/slideshare-plugin).

<p align="center"><img src="slideshare-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/slideshare.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `slideshare.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

## How to embed a presentation?

Create a `[slideshare]` shortcut.

The following arguments are available:

`ID` = last part of a [Slideshare](http://www.slideshare.net/) link, e.g. `http://www.slideshare.net/slideshow/embed_code/37321279`  
`STYLE` = presentation style, e.g. `left`, `center`, `right`  
`WIDTH` = presentation width, pixel or percent  
`HEIGHT` = presentation height, pixel or percent   

## Example

Embedding a presentation:

    [slideshare 37321279]
    [slideshare 37321279 left 320 200]
    [slideshare 37321279 right 320 200]

## Developer

Datenstrom
