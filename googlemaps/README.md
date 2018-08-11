Googlemaps plugin 0.6.1
=======================
Embed Google maps. [See demo](https://developers.datenstrom.se/plugins/googlemaps).

<p align="center"><img src="googlemaps-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/googlemaps.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `googlemaps.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to embed a map

Create a `[googlemaps]` shortcut.

The following arguments are available, all but the first argument are optional:

`Address` = text you enter on [Google maps](https://maps.google.com/), wrap multiple words into quotes  
`Zoom` = zoom value, the default zoom is 15  
`Style` = map style, e.g. `left`, `center`, `right`  
`Width` = map width, pixel or percent  
`Height` = map height, pixel or percent  

## Example

Embedding a map:

    [googlemaps Stockholm]
    [googlemaps "Bredgatan 1, Lund, Sweden"]
    [googlemaps "Bredgatan 1, Lund, Sweden" 9 right 320 200]

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
