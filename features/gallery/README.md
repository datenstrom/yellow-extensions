Gallery 0.8.2
=============
Image gallery with popup. [See demo](https://developers.datenstrom.se/features/gallery).

<p align="center"><img src="gallery-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/gallery.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `gallery.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to add a gallery

Create a `[gallery]` shortcut.

The following arguments are available, all but the first argument are optional:
  
`Pattern` = file name as regular expression  
`Style` = gallery style, e.g. `photoswipe`, `simple`  
`Size` = image size, pixel or percent

The extension uses [PhotoSwipe v4.1.2](https://github.com/dimsemenov/photoswipe) by Dmitry Semenov. It's licensed under [MIT license](https://opensource.org/licenses/MIT).

## How to configure image captions

The image captions can be configured in file `system/settings/text.ini`. You can define the text setting here, for example a short text that is displayed below the image. See example below.

## Example

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

Defining image captions in your text settings:

    photo-1314380.jpg: This is an example caption.
    photo-2387365-fika-time.jpg: Fika is an important part of life in Sweden. Photo: Taylor Franz
    photo-2391666-start-painting.jpg: Watercolors, brushes and paper. Photo: Tim Arterbury

## Developer

Datenstrom featuring Dmitry Semenov. [Get support](https://developers.datenstrom.se/help/support).
