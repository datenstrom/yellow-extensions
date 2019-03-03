Preview 0.8.2
=============
Show pages with image preview. [See demo](https://developers.datenstrom.se/features/).

<p align="center"><img src="preview-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/preview.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `preview.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to show a preview

Create a `[preview]` shortcut.

The following arguments are available, all arguments are optional:

`Location ` = preview location  
`Style` = preview style, e.g. `stretchable`, `simple`  
`Size` = image size, pixel or percent  

For every page there has to be an image of similar file name in your `media/images` folder.

## Example

Showing a preview:

    [preview]
    [preview /features/ - 30%]
    [preview /features/ simple 30%]

Showing a preview, square thumbnails:

    [preview /features/ - 64]
    [preview /features/ - 128]
    [preview /features/ simple 150]

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
