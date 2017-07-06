Slider plugin 0.6.7
===================
Image gallery with slider. [See demo](https://developers.datenstrom.se/plugins/slider-plugin).

<p align="center"><img src="slider-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/slider.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `slider.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

## How to add a gallery?

Create a `[slider]` shortcut.

The following arguments are available:
  
`PATTERN` = file name as regular expression  
`STYLE` = gallery style, e.g. `flickity`  
`SIZE` = image size, pixel or percent  
`AUTOPLAY` = play images automatically, delay time in milliseconds

The plugins uses [Flickity v1.2.1](http://flickity.metafizzy.co) by David DeSandro. It's licensed under [GPLv3](https://opensource.org/licenses/GPL-3.0). Flickity supports most web browsers, including Chrome, Firefox, Safari, Opera and IE.

## Example

Adding an image gallery:

    [slider]
    [slider photo.*jpg]
    [slider photo.*jpg - 20%]

Adding an image gallery, play automatically:

    [slider photo.*jpg - - 1000]
    [slider photo.*jpg - - 5000]
    [slider photo.*jpg - 20% 5000]

Adding an image gallery from a subfolder, play automatically:

    [slider photo-album/ - - 1000]
    [slider photo-album/ - - 5000]
    [slider photo-album/ - 20% 5000]

## Developer

Datenstrom featuring David DeSandro
