Markdown 0.8.14
===============
Textformatierung für Menschen.

<p align="center"><img src="markdown-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man diese Erweiterung installiert

1. [Datenstrom Yellow herunterladen und installieren](https://github.com/datenstrom/yellow/).
2. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/markdown.zip). Falls du Safari verwendest, rechtsklicke und wähle "Verknüpfte Datei laden unter".
3. Kopiere `markdown.zip` in dein `system/extensions`-Verzeichnis.

Zum Deinstallieren lösche einfach die [Erweiterungsdateien](extension.ini).

## Wie man Text formatiert

Markdown ist eine praktische Art um Webseiten zu bearbeiten.

Diese Erweiterung benutzt [Markdown Extra v1.9.0](https://github.com/michelf/php-markdown) von Michel Fortin, ein Werkzeug zur Konvertierung von Text nach HTML. Es ist unter [BSD-Lizenz](https://opensource.org/licenses/BSD-3-Clause) lizenziert. Hier ist der [Markdown-Syntax](http://commonmark.org/help/), eine Liste der [Markdown-Extra-Funktionen](https://michelf.ca/projects/php-markdown/extra/) und [GitHub-Flavored-Markdown](https://help.github.com/en/articles/basic-writing-and-formatting-syntax). 

Es gibt auch einen experimentellen Markdown-Parser, basierend auf [Parsedown Extra v1.8.0-beta-7](https://github.com/erusev/parsedown) von Emanuil Rusev. Es ist unter [MIT-Lizenz](https://opensource.org/licenses/MIT) lizenziert. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/features/markdown/markdownx.php) und in dein `system/extensions`-Verzeichnis kopieren. Du kannst Parser wechseln mit `Parser: markdown` = Markdown Extra, `Parser: markdownx` = Parsedown Extra.

## Wie man Abkürzungen benutzt

Zusätzlich zu Markdown gibt es Abkürzungen. Markdown bietet die grundlegenden Funktionen, Abkürzungen bieten häufige Funktionen. Du kannst damit [Bilder](https://github.com/datenstrom/yellow-extensions/tree/master/features/image/README-de.md), [Emoji](https://github.com/datenstrom/yellow-extensions/tree/master/features/emojiawesome/README-de.md), [Icons](https://github.com/datenstrom/yellow-extensions/tree/master/features/fontawesome/README-de.md), [Karten](https://github.com/datenstrom/yellow-extensions/tree/master/features/googlemap/README-de.md), [Inhaltsverzeichnis](https://github.com/datenstrom/yellow-extensions/tree/master/features/toc/README-de.md) und mehr in deine Webseite einbinden.

## Beispiele

Text formatieren:

    Normal **Fettschrift** *Kursiv* ~~Durchgestrichen~~ `Code`

Eine Liste erstellen:

    * Punkt eins
    * Punkt zwei
    * Punkt drei

Eine sortierte Liste erstellen:

    1. Punkt eins
    2. Punkt zwei
    3. Punkt drei

Eine Aufgabenliste erstellen:

    - [x] Punkt eins
    - [ ] Punkt zwei
    - [ ] Punkt drei

Eine Überschrift erstellen:

    # Überschrift 1
    ## Überschrift 2
    ### Überschrift 3

Zitate erstellen:

    > Zitat
    >> Zitat im Zitat
    >>> Zitat im Zitat im Zitat

Links erstellen:

    [Link zu Seite](/help/how-to-make-a-website)
    [Link zu Datei](/media/downloads/yellow.pdf)
    [Link zu Webseite](https://datenstrom.se/de/)

Bilder hinzufügen:

    [image picture.jpg]
    [image picture.jpg Picture]
    [image picture.jpg "Dies ist ein Beispielbild"]

Tabellen erstellen:

    | Kaffee     | Milch | Stärke  |
    |------------|-------|---------|
    | Espresso   | nein  | stark   |
    | Macchiato  | ja    | mittel  |
    | Cappuccino | ja    | schwach |

Fußnoten erstellen:

    Text mit einer Fußnote[^1] und noch weiteren Fußnoten.[^2] [^3]
    
    [^1]: Hier ist die erste Fußnote
    [^2]: Hier ist die zweite Fußnote
    [^3]: Hier ist die dritte Fußnote

Quellcode anzeigen:

    ```
    Quellcode wird unverändert angezeigt.
    function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    ```

Absätze erstellen:

    Hier ist der erste Absatz. Der Text kann über mehrere Zeilen gehen
    und kann durch eine Leerzeile vom nächsten Absatz getrennt werden.

    Hier ist der zweite Absatz.

Zeilenumbrüche erstellen:

    Hier ist die erste Zeile⋅⋅
    Hier ist die zweite Zeile⋅⋅
    Hier ist die dritte Zeile⋅⋅
    
    Leerzeichen am Zeilenende sind dargestellt durch Punkte (⋅)

Hinweise erstellen:

    ! Hier ist ein Hinweis mit Warnung
    
    !! Hier ist ein Hinweis mit Fehler
    
    !!! Hier ist ein Hinweis mit Tipp

CSS benutzen:

    ! {.class}
    ! Hier ist ein Hinweis mit benutzerdefinierter Klasse.
    ! Der Text kann über mehrere Zeilen gehen
    ! und Markdown-Formatierung beinhalten.

HTML benutzen:

    <strong>Text mit HTML</strong> kann wahlweise benutzt werden.
    <a href="https://datenstrom.se/de/" target="_blank">Link in einem neuen Tab öffnen</a>.

## Entwickler

Datenstrom. [Support finden](https://datenstrom.se/de/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
