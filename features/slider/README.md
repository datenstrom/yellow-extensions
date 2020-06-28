Slider 0.8.4
============
Image gallery with slider.

<p align="center"><img src="slider-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/slider.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `slider.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to add an image gallery

Create a `[slider]` shortcut.

The following arguments are available, all but the first argument are optional:
  
`Pattern` = file name as regular expression  
`Style` = gallery style, e.g. `flickity`  
`Size` = image size, pixel or percent  
`Autoplay` = play images automatically, delay time in milliseconds  

The image formats GIF, JPG, PNG and SVG are supported. All media files are located in the `media` folder. The `media/images` folder is the place to store your images. The `media/thumbnails` folder contains image thumbnails. You can also create additional folders and organise files as you like.

This extension uses [Flickity v2.0.9](https://github.com/metafizzy/flickity) by David DeSandro. It's licensed under [GPLv3](https://opensource.org/licenses/GPL-3.0).

## Settings

The following settings can be configured in file `system/settings/system.ini`:

`SliderStyle` = gallery style, e.g. `flickity`  
`SliderAutoplay` = play images automatically, delay time in milliseconds  

## Examples

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

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>