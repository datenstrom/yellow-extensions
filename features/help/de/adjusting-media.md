---
Title: Medien anpassen 
---
Alle Medien befinden sich im `media`-Verzeichnis. Hier speichert man Bilder und andere Dateien.

    ├── content
    ├── media
    │   ├── downloads
    │   ├── images
    │   └── thumbnails
    └── system

Das `downloads`-Verzeichnis enthält Dateien zum Herunterladen. Das `images`-Verzeichnis ist zum Speichern von Bildern gedacht. Das `thumbnails`-Verzeichnis enthält Miniaturbilder. Man kann auch weitere Verzeichnisse hinzufügen und Dateien so organisieren wie man will. Im Grunde genommen kann jede Mediendatei von der Webseite heruntergeladen werden. 

## Bilder

Du kannst die [Image-Erweiterung](https://github.com/datenstrom/yellow-extensions/tree/master/features/image) benutzen um Bilder einzubinden. Um ein neues Bild hinzuzufügen, kopierst du eine neue Datei ins `images`-Verzeichnis und erstellst eine `[image]`-Abkürzung. Die Bildformate GIF, JPG, PNG und SVG werden unterstützt. Hier ist ein Beispiel:


    [image picture.jpg]
    [image picture.jpg Picture]
    [image picture.jpg "Das ist ein Beispielbild"]

Bilder in unterschiedlichen Stilen:

    [image picture.jpg Beispiel left]
    [image picture.jpg Beispiel center]
    [image picture.jpg Beispiel right]

Bilder in unterschiedlichen Größen:

    [image picture.jpg Beispiel - 64 64]
    [image picture.jpg Beispiel - 320 200]
    [image picture.jpg Beispiel - 50%]

## Videos

Du kannst die [Youtube-Erweiterung](https://github.com/datenstrom/yellow-extensions/tree/master/features/youtube) benutzen um Videos einzubinden.

    [youtube fhs55HEl-Gc]
    [youtube fhs55HEl-Gc left 200 112]
    [youtube fhs55HEl-Gc right 200 112]
