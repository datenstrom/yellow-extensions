Slider 0.8.4
============
Bildergalerie mit Schieber.

<p align="center"><img src="slider-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man diese Erweiterung installiert

1. [Datenstrom Yellow herunterladen und installieren](https://github.com/datenstrom/yellow/).
2. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/slider.zip). Falls du Safari verwendest, rechtsklicke und wähle "Verknüpfte Datei laden unter".
3. Kopiere `slider.zip` in dein `system/extensions`-Verzeichnis.

Zum Deinstallieren lösche einfach die [Erweiterungsdateien](extension.ini).

## Wie man eine Bildergalerie hinzufügt

Erstelle eine `[slider]`-Abkürzung.

Die folgenden Argumente sind verfügbar, alle bis auf das erste Argument sind optional:
  
`Pattern` = Dateiname als regulärer Ausdruck  
`Style` = Galeriestil, z.B. `flickity`  
`Size` = Bildgröße, Pixel oder Prozent    
`Autoplay` = Bilder automatisch abspielen, Verzögerungszeit in Millisekunden  

Die Bildformate GIF, JPG, PNG und SVG werden unterstützt. Alle Mediendateien befinden sich im `media`-Verzeichnis. Das `media/images`-Verzeichnis ist zum Speichern von Bildern gedacht. Das `media/thumbnails`-Verzeichnis enthält Miniaturbilder. Man kann auch weitere Verzeichnisse hinzufügen und Dateien so organisieren wie man will.

Diese Erweiterung benutzt [Flickity v2.0.9](https://github.com/metafizzy/flickity) von David DeSandro. Es ist unter [GPLv3](https://opensource.org/licenses/GPL-3.0) lizenziert.

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/settings/system.ini` vorgenommen werden:

`SliderStyle` = Galeriestil, z.B. `flickity`  
`SliderAutoplay` = Bilder automatisch abspielen, Verzögerungszeit in Millisekunden  

## Beispiele

Bildergalerie hinzufügen:

    [slider photo.*jpg]
    [slider photo.*jpg - 20%]
    [slider photo.*jpg simple 20%]

Bildergalerie hinzufügen, automatisch abspielen:

    [slider photo.*jpg - - 1000]
    [slider photo.*jpg - - 5000]
    [slider photo.*jpg - 20% 5000]

Bildergalerie aus einem Unterverzeichnis hinzufügen, automatisch abspielen:

    [slider photo-album/ - - 1000]
    [slider photo-album/ - - 5000]
    [slider photo-album/ - 20% 5000]

## Entwickler

Datenstrom. [Support finden](https://datenstrom.se/de/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>