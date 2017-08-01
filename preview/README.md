Preview plugin 0.7.2
====================
Show pages with image preview. [See demo](https://developers.datenstrom.se/plugins/).

<p align="center"><img src="preview-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/preview.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `preview.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

## How to show a preview?

Create a `[preview]` shortcut.

The following arguments are available:

`LOCATION ` = preview location  
`STYLE` = preview style, e.g. `stretchable`, `simple`  
`SIZE` = image size, pixel or percent  

For every page there has to be an image of similar file name in your `media/images` folder.

## Example

Showing a preview:

    [preview]
    [preview /plugins/ - 30%]
    [preview /plugins/ simple 30%]

Showing a preview, square thumbnails:

    [preview /plugins/ - 64]
    [preview /plugins/ - 128]
    [preview /plugins/ simple 150]

## Developer

Datenstrom
