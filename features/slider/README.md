Slider 0.8.2
============
Image gallery with slider. [See demo](https://developers.datenstrom.se/features/slider).

<p align="center"><img src="slider-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/slider.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `slider.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to add a gallery

Create a `[slider]` shortcut.

The following arguments are available, all but the first argument are optional:
  
`Pattern` = file name as regular expression  
`Style` = gallery style, e.g. `flickity`  
`Size` = image size, pixel or percent  
`Autoplay` = play images automatically, delay time in milliseconds

The extension uses [Flickity v2.0.9](https://github.com/metafizzy/flickity) by David DeSandro. It's licensed under [GPLv3](https://opensource.org/licenses/GPL-3.0).

## Example

Adding an image gallery:

    [slider photo.*jpg]
    [slider photo.*jpg - 20%]
    [slider photo.*jpg simple 20%]

Adding an image gallery, play automatically:

    [slider photo.*jpg - - 1000]
    [slider photo.*jpg - - 5000]
    [slider photo.*jpg - 20% 5000]

Adding an image gallery from a subfolder, play automatically:

    [slider photo-album/ - - 1000]
    [slider photo-album/ - - 5000]
    [slider photo-album/ - 20% 5000]

## Developer

Datenstrom featuring David DeSandro. [Get support](https://developers.datenstrom.se/help/support).
