Image 0.8.8
===========
Images and thumbnails.

<p align="center"><img src="image-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/image.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `image.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to add an image

Create an `[image]` shortcut.

The following arguments are available, all but the first argument are optional:
 
`Name` = file name  
`Alt` = alternative text for image  
`Style` = image style, e.g. `left`, `center`, `right`  
`Width` = image width, pixel or percent  
`Height` = image height, pixel or percent   

The image formats GIF, JPG, PNG and SVG are supported. All media files are located in the `media` folder. The `media/images` folder is the place to store your images. The `media/thumbnails` folder contains image thumbnails. You can also create additional folders and organise files as you like.

This extension uses [GD graphics library](https://github.com/libgd/libgd) by Thomas Boutell. There's also a [gallery extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/gallery).

## Settings

The following settings can be configured in file `system/settings/system.ini`:

`ImageAlt` = alternative text for image  
`ImageUploadWidthMax` = maximum width for upload, larger images are resized  
`ImageUploadHeightMax` = maximum height for upload, larger images are resized  
`ImageUploadJpgQuality` = JPG quality for uploaded images  
`ImageThumbnailLocation` = location for thumbnails  
`ImageThumbnailDirectory` = directory for thumbnails  
`ImageThumbnailJpgQuality` = JPG quality for thumbnails  

## Examples

Adding images:

    [image picture.jpg]
    [image picture.jpg Picture]
    [image picture.jpg "This is an example image"]

Adding images, different styles:

    [image picture.jpg Example left]
    [image picture.jpg Example center]
    [image picture.jpg Example right]

Adding images, different sizes:

    [image picture.jpg Example - 64 64]
    [image picture.jpg Example - 320 200]
    [image picture.jpg Example - 50%]

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
