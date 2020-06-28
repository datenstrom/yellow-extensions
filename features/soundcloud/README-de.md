Soundcloud 0.8.3
================
Soundcloud-Audio einbinden.

<p align="center"><img src="soundcloud-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man diese Erweiterung installiert

1. [Datenstrom Yellow herunterladen und installieren](https://github.com/datenstrom/yellow/).
2. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/soundcloud.zip). Falls du Safari verwendest, rechtsklicke und wähle "Verknüpfte Datei laden unter".
3. Kopiere `soundcloud.zip` in dein `system/extensions`-Verzeichnis.

Zum Deinstallieren lösche einfach die [Erweiterungsdateien](extension.ini).

## Wie binde ich eine Audiospur ein?

Erstelle eine `[soundcloud]`-Abkürzung. 

Die folgenden Argumente sind verfügbar, alle bis auf das erste Argument sind optional:

`Id` = letzte Teil eines [Soundcloud](http://www.soundcloud.com/)-Links, z.B. `http://api.soundcloud.com/tracks/101175715`  
`Style` = Audiospurstil, z.B. `left`, `center`, `right`  
`Width` = Audiospurbreite, Pixel oder Prozent  
`Height` = Audiospurhöhe, Pixel oder Prozent   

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/settings/system.ini` vorgenommen werden:

`SoundcloudStyle` = Audiospurstil, z.B. `left`, `center`, `right`  

## Beispiele

Audiospur einbinden:

    [soundcloud 101175715]
    [soundcloud 101175715 left 200 166]
    [soundcloud 101175715 right 200 166]

## Entwickler

Datenstrom. [Support finden](https://datenstrom.se/de/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
