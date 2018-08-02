Image plugin 0.7.3
==================
Images and thumbnails. [See demo](https://developers.datenstrom.se/plugins/image).

<p align="center"><img src="image-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/image.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `image.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to add an image

Create an `[image]` shortcut.

The following arguments are available, all but the first argument are optional:
 
`NAME` = file name  
`TEXT` = text description  
`STYLE` = image style, e.g. `left`, `center`, `right`  
`WIDTH` = image width, pixel or percent  
`HEIGHT` = image height, pixel or percent   

The plugin uses [GD graphics library](http://www.libgd.org/) by Thomas Boutell for resizing images.

## Example

Adding an image:

    [image picture.jpg]
    [image picture.jpg Picture]
    [image picture.jpg "This is an example image"]

Adding an image, different styles:

    [image picture.jpg Example left]
    [image picture.jpg Example centre]
    [image picture.jpg Example right]

Adding an image, different sizes:

    [image picture.jpg Example - 64 64]
    [image picture.jpg Example - 320 200]
    [image picture.jpg Example - 50%]

## Developer

Datenstrom featuring Thomas Boutell. [Get support](https://developers.datenstrom.se/help/support).
