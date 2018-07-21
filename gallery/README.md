Gallery plugin 0.7.3
====================
Image gallery with popup. [See demo](https://developers.datenstrom.se/plugins/gallery).

<p align="center"><img src="gallery-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/gallery.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `gallery.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to add a gallery?

Create a `[gallery]` shortcut.

The following arguments are available:
  
`PATTERN` = file name as regular expression  
`STYLE` = gallery style, e.g. `photoswipe`, `simple`  
`SIZE` = image size, pixel or percent

The plugins uses [PhotoSwipe v4.1.2](http://photoswipe.com) by Dmitry Semenov. It's licensed under [MIT license](https://opensource.org/licenses/MIT). PhotoSwipe supports most web browsers, including Chrome, Firefox, Safari, Opera and IE.

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

## Developer

Datenstrom featuring Dmitry Semenov. [Get support](https://developers.datenstrom.se/help/support).
