Image plugin 0.7.2
==================
Images and thumbnails. [See demo](https://developers.datenstrom.se/plugins/image-plugin).

<p align="center"><img src="image-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/image.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `image.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

## How to add an image?

Create an `[image]` shortcut.

The following arguments are available:
 
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

    [image picture.jpg Picture left]
    [image picture.jpg Picture centre]
    [image picture.jpg Picture right]

Adding an image, different sizes:

    [image picture.jpg Picture - 64 64]
    [image picture.jpg Picture - 320 200]
    [image picture.jpg Picture - 50%]

## Developer

Datenstrom
