Soundcloud 0.8.3
================
Embed Soundcloud audio tracks.

<p align="center"><img src="soundcloud-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/soundcloud.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `soundcloud.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to embed an audio track

Create a `[soundcloud]` shortcut.
 
The following arguments are available, all but the first argument are optional:

`Id` = last part of a [Soundcloud](http://www.soundcloud.com/) link, e.g. `http://api.soundcloud.com/tracks/101175715`  
`Style` = audio track style, e.g. `left`, `center`, `right`  
`Width` = audio track width, pixel or percent  
`Height` = audio track height, pixel or percent   

## Settings

The following settings can be configured in file `system/settings/system.ini`:

`SoundcloudStyle` = audio track style, e.g. `left`, `center`, `right`  

## Examples

Embedding an audio track:

    [soundcloud 101175715]
    [soundcloud 101175715 left 200 166]
    [soundcloud 101175715 right 200 166]

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
