Image 0.8.8
===========
Bilder in unterschiedlichen Größen.

<p align="center"><img src="image-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man diese Erweiterung installiert

1. [Datenstrom Yellow herunterladen und installieren](https://github.com/datenstrom/yellow/).
2. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/image.zip). Falls du Safari verwendest, rechtsklicke und wähle "Verknüpfte Datei laden unter".
3. Kopiere `image.zip` in dein `system/extensions`-Verzeichnis.

Zum Deinstallieren lösche einfach die [Erweiterungsdateien](extension.ini).

## Wie man ein Bild hinzufügt

Erstelle eine `[image]`-Abkürzung.

Die folgenden Argumente sind verfügbar, alle bis auf das erste Argument sind optional:
 
`Name` = Dateiname  
`Alt` = alternative Bildbeschreibung  
`Style` = Bildstil, z.B. `left`, `center`, `right`  
`Width` = Bildbreite, Pixel oder Prozent  
`Height` = Bildhöhe, Pixel oder Prozent   

Die Bildformate GIF, JPG, PNG und SVG werden unterstützt. Alle Mediendateien befinden sich im `media`-Verzeichnis. Das `media/images`-Verzeichnis ist zum Speichern von Bildern gedacht. Das `media/thumbnails`-Verzeichnis enthält Miniaturbilder. Man kann auch weitere Verzeichnisse hinzufügen und Dateien so organisieren wie man will.

Diese Erweiterung benutzt die [GD-Grafikbibliothek](https://github.com/libgd/libgd) von Thomas Boutell. Es gibt auch eine [Gallery-Erweiterung](https://github.com/datenstrom/yellow-extensions/tree/master/features/gallery/README-de.md).

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/settings/system.ini` vorgenommen werden:

`ImageAlt` = alternative Bildbeschreibung  
`ImageUploadWidthMax` = maximale Breite zum Hochladen, größere Bilder werden verkleinert  
`ImageUploadHeightMax` = maximale Höhe zum Hochladen, größere Bilder werden verkleinert  
`ImageUploadJpgQuality` = JPG-Qualität für hochgeladene Bilder  
`ImageThumbnailLocation` = Ort für Miniaturbilder  
`ImageThumbnailDirectory` = Verzeichnis für Miniaturbilder  
`ImageThumbnailJpgQuality` = JPG-Qualität für Miniaturbilder  

## Beispiele

Bilder hinzufügen:

    [image picture.jpg]
    [image picture.jpg Picture]
    [image picture.jpg "Das ist ein Beispielbild"]

Bilder in unterschiedlichen Stilen hinzufügen:

    [image picture.jpg Beispiel left]
    [image picture.jpg Beispiel center]
    [image picture.jpg Beispiel right]

Bilder in unterschiedliche Größen hinzufügen:

    [image picture.jpg Beispiel - 64 64]
    [image picture.jpg Beispiel - 320 200]
    [image picture.jpg Beispiel - 50%]

## Entwickler

Datenstrom. [Support finden](https://datenstrom.se/de/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
