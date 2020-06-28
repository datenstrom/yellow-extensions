Twitter 0.8.4
=============
Twitter-Nachrichten einbinden.

<p align="center"><img src="twitter-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man diese Erweiterung installiert

1. [Datenstrom Yellow herunterladen und installieren](https://github.com/datenstrom/yellow/).
2. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/twitter.zip). Falls du Safari verwendest, rechtsklicke und wähle "Verknüpfte Datei laden unter".
3. Kopiere `twitter.zip` in dein `system/extensions`-Verzeichnis.

Zum Deinstallieren lösche einfach die [Erweiterungsdateien](extension.ini).

## Wie man eine Nachricht einbindet

Erstelle eine `[twitter]`-Abkürzung. 

Die folgenden Argumente sind verfügbar, alle bis auf das erste Argument sind optional:
 
`Id` = letzte Teil eines [Twitter](https://www.twitter.com)-Links, z.B. `https://twitter.com/dog_feelings/status/1169078881963261953`  
`Theme` = Nachrichtenthema, z.B. `light`, `dark`  
`Style` = Nachrichtenstil, z.B. `left`, `center`, `right`  
`Width` = Nachrichtenbreite, Pixel oder Prozent  
`Height` = Nachrichtenhöhe, Pixel oder Prozent  

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/settings/system.ini` vorgenommen werden:

`TwitterTheme` = Nachrichtenthema, z.B. `light`, `dark`  

## Beispiele

Nachricht einbinden:

    [twitter 1169078881963261953]
    [twitter 1169078881963261953 dark]
    [twitter 1169078881963261953 light right]

Verlauf einbinden:

    [twitter dog_feelings]
    [twitter dog_feelings/likes]
    [twitter dog_feelings/likes light - 250 250]

Folgen-Schaltfläche einbinden:

    [twitterfollow dog_feelings]

## Entwickler

Datenstrom, Steffen Schultz. [Support finden](https://datenstrom.se/de/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
