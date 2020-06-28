Highlight 0.8.7
===============
Quellcode hervorheben.

<p align="center"><img src="highlight-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man diese Erweiterung installiert

1. [Datenstrom Yellow herunterladen und installieren](https://github.com/datenstrom/yellow/).
2. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/highlight.zip). Falls du Safari verwendest, rechtsklicke und wähle "Verknüpfte Datei laden unter".
3. Kopiere `highlight.zip ` in dein `system/extensions`-Verzeichnis.

Zum Deinstallieren lösche einfach die [Erweiterungsdateien](extension.ini).

## Wie man Quellcode hervorhebt

Wickle Codeblöcke in \`\`\` ein und fügen eine Sprachidentifizierung hinzu.

Diese Erweiterung benutzt [highlight.php 9.15.10](https://github.com/scrivo/highlight.php) von Ivan Sagalaev und Geert Bergman, es unterstützt ungefähr 180 Programmiersprachen. Es ist unter [BSD-Lizenz](https://opensource.org/licenses/BSD-3-Clause) lizenziert. Die folgenden Sprachen sind enthalten: C, CPP, CSS, HTML, JavaScript, JSON, PHP, Python, YAML. Du kannst weitere [Sprachdateien](https://github.com/scrivo/highlight.php/tree/master/Highlight/languages) herunterladen, umbenennen und in dein `system/extensions`-Verzeichnis kopieren.

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/settings/system.ini` vorgenommen werden:

`HighlightClass` = Hervorhebungs-Klasse, z.B. `highlight`  
`HighlightLineNumber` = Zeilennummer anzeigen, 1 oder 0   
`HighlightAutodetectLanguages` = Sprachen zur automatischen Erkennung, durch Komma getrennt  

## Beispiele

Hervorhebung von JavaScript-Quellcode:

    ``` javascript
    var ready = function() 
    {
        console.log("Hello world");
        // Add more JavaScript code here
    }
    window.addEventListener('load', ready, false);
    ```

Hervorhebung von HTML-Quellcode, ohne und mit Zeilennummer:
    
    ``` html
    <body>
    <p>Hello world!</p>
    </body>
    ```

    ``` html {.with-line-number}
    <body>
    <p>Hello world!</p>
    </body>
    ```

## Entwickler

Datenstrom. [Support finden](https://datenstrom.se/de/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
