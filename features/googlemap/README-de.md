Googlemap 0.8.5
===============
Google-Karten einbinden.

<p align="center"><img src="googlemap-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man diese Erweiterung installiert

1. [Datenstrom Yellow herunterladen und installieren](https://github.com/datenstrom/yellow/).
2. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/googlemap.zip). Falls du Safari verwendest, rechtsklicke und wähle "Verknüpfte Datei laden unter".
3. Kopiere `googlemap.zip ` in dein `system/extensions`-Verzeichnis.

Zum Deinstallieren lösche einfach die [Erweiterungsdateien](extension.ini).

## Wie man eine Karte einbindet

Erstelle eine `[googlemap]`-Abkürzung.

Die folgenden Argumente sind verfügbar, alle bis auf das erste Argument sind optional:

`Address` = Text den man auf [Google Maps](https://maps.google.com/) eingibt, mehrere Wörter in Anführungszeichen setzen  
`Zoom` = Zoomwert, der Standardzoom ist 15  
`Style` = Kartenstil, z.B. `left`, `center`, `right`  
`Width` = Kartenbreite, Pixel oder Prozent  
`Height` = Kartenhöhe, Pixel oder Prozent  

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/settings/system.ini` vorgenommen werden:

`GooglemapZoom` = Zoomwert  
`GooglemapStyle` = Kartenstil, z.B. `flexible`   

## Beispiele

Karte einbinden:

    [googlemap Stockholm]
    [googlemap "Bredgatan 1, Lund, Sweden"]
    [googlemap "Bredgatan 1, Lund, Sweden" 9 right 320 200]

Karte einbinden, GPS-Koordinaten:

    [googlemap "59.32820, 18.07007"]
    [googlemap "59.32820, 18.07007" 16]
    [googlemap "59.32820, 18.07007" 16 right 320 200]

## Entwickler

Datenstrom. [Support finden](https://datenstrom.se/de/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
