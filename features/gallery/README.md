Gallery 0.8.6
=============
Image gallery with popup.

<p align="center"><img src="gallery-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/gallery.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `gallery.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to add an image gallery

Create a `[gallery]` shortcut.

The following arguments are available, all but the first argument are optional:
  
`Pattern` = file name as regular expression  
`Style` = gallery style, e.g. `photoswipe`, `simple`  
`Size` = image size, pixel or percent  

The image formats GIF, JPG, PNG and SVG are supported. All media files are located in the `media` folder. The `media/images` folder is the place to store your images. The `media/thumbnails` folder contains image thumbnails. You can also create additional folders and organise files as you like.

This extension uses [PhotoSwipe v4.1.2](https://github.com/dimsemenov/photoswipe) by Dmitry Semenov. It's licensed under [MIT license](https://opensource.org/licenses/MIT).

## How to show image captions

Image captions can be configured in the text settings. Open file `system/settings/text.ini` and add a new line for each image. A line consists of file name and description.

## Settings

The following settings can be configured in your text settings.

`GalleryStyle` = gallery style, e.g. `photoswipe`, `simple`  

## Examples

Adding an image gallery:

    [gallery photo.*jpg]
    [gallery photo.*jpg - 20%]
    [gallery photo.*jpg simple 20%]

Adding an image gallery, square thumbnails:

    [gallery photo.*jpg - 64]
    [gallery photo.*jpg - 150]
    [gallery photo.*jpg simple 150]

Adding an image gallery from a subfolder, square thumbnails:

    [gallery photo-album/ - 64]
    [gallery photo-album/ - 150]
    [gallery photo-album/ simple 150]

Configuring image captions in the text settings:

    Language: en
    picture.jpg: This is an example image
    photo-2387365-fika-time.jpg: Fika is an important part of life in Sweden. Photo: Taylor Franz
    photo-2391666-start-painting.jpg: Watercolors, brushes and paper. Photo: Tim Arterbury

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
