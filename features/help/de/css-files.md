---
Title: CSS-Dateien
---
Wie man das Aussehen seiner Webseite anpasst.

## CSS anpassen

Um das [CSS](https://www.w3schools.com/css/) deiner Webseite anzupassen, ändere das Thema. Das Standardthema wird in den [Systemeinstellungen](adjusting-system#systemeinstellungen) festgelegt. Ein anderes Theme lässt sich in den [Einstellungen](markdown-cheat-sheet#einstellungen) ganz oben auf jeder Seite festlegen, zum Beispiel `Theme: custom`. 

Hier ist eine Beispiel-Datei `system/resources/custom.css`:

``` css
.page {
    background-color: #fc4;
    color: #fff;
    text-align:center; 
}
```

## Ressourcen anpassen

Im `system/resources`-Verzeichnis befinden sich alle Ressourcendateien. Hier speichert man Bilder und Schriftarten, die in Themen verwendet werden. Jede Webseite hat ein kleines Icon, auch Favicon genannt. Der Webbrowser zeigt dieses Icon beispielsweise in der Adresszeile an.
