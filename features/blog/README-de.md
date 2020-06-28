Blog 0.8.6
==========
Blog für deine Webseite.

<p align="center"><img src="blog-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man diese Erweiterung installiert

1. [Datenstrom Yellow herunterladen und installieren](https://github.com/datenstrom/yellow/).
2. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/blog.zip). Falls du Safari verwendest, rechtsklicke und wähle "Verknüpfte Datei laden unter".
3. Kopiere `blog.zip` in dein `system/extensions`-Verzeichnis.

Zum Deinstallieren lösche einfach die [Erweiterungsdateien](extension.ini).

## Wie man ein Blog benutzt

Das Blog ist auf deiner Webseite vorhanden als `http://website/blog/`. Um das Blog auf der Startseite anzuzeigen, gehe in dein `content`-Verzeichnis und lösche das `1-home`-Verzeichnis. Um eine neue Blogseite hinzuzufügen, erstelle eine neue Datei im Blogverzeichnis. Ganz oben auf einer Seite kannst du `Published` und weitere [Einstellungen](https://github.com/datenstrom/yellow-extensions/tree/master/features/core/README-de.md#einstellungen) festlegen. Das Veröffentlichungsdatum wird zur Sortierung der Blogseiten verwendet. Mit `Tag` kann man ähnliche Seiten gruppieren. Du kannst `[--more--]` benutzen, um an der gewünschten Stelle einen Seitenumbruch zu erzeugen.

## Wie man Bloginformationen anzeigt

Du kannst Abkürzungen verwenden, um Informationen über das Blog anzuzeigen:

`[blogauthors]` für eine Liste der Autoren  
`[blogtags]` für eine Liste der Tags  
`[blogarchive]` für eine Liste der Monate  
`[blogrelated]` für eine Liste von Seiten, ähnlich zur aktuellen Seite  
`[blogpages]` für eine Liste von Seiten, alphabetische Reihenfolge  
`[blogchanges]` für eine Liste von Seiten, veröffentlichte Reihenfolge  

Die folgenden Argumente sind verfügbar, alle bis auf das erste Argument sind optional:

`Location` = Ort des Blogs  
`PagesMax` = Anzahl der Seiten pro Abkürzung, 0 für unbegrenzt  
`Author` = Seiten eines bestimmten Autors anzeigen, nur bei `[blogpages]` oder `[blogchanges]`  
`Tag` = Seiten mit bestimmten Tag anzeigen, nur bei `[blogpages]` oder `[blogchanges]`  

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/settings/system.ini` vorgenommen werden:

`BlogLocation` = Ort des Blogs, leer bedeutet aktuelles Verzeichnis  
`BlogNewLocation` = Ort für neue Blogseite  
`BlogPagesMax` = Anzahl der Seiten pro Abkürzung  
`BlogPaginationLimit` = Anzahl der Einträge pro Seite 

Die folgenden Dateien können angepasst werden:

`content/shared/page-new-blog.md` = Inhaltsdatei für neue Blogseite   
`system/layouts/blogpages.html` = Layoutdatei für Bloghauptseite  
`system/layouts/blog.html` = Layoutdatei für individuelle Blogseite 

## Beispiele

Inhaltsdatei mit Blogseite:

    ---
    Title: Blog-Beispiel
    Published: 2013-04-07
    Author: Datenstrom
    Layout: blog
    Tag: Beispiel
    ---
    Das ist eine Beispiel-Blogseite.

    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

Inhaltsdatei mit Blogseite und Seitenumbruch:

    ---
    Title: Fika ist gut für dich
    Published: 2016-06-01
    Author: Datenstrom
    Layout: blog
    Tag: Beispiel, Kaffee
    ---
    Fika ist ein schwedischer Brauch. Es ist eine Kaffeepause, bei der 
    Menschen bei einer Tasse Kaffee oder Tee zusammenkommen. [--more--]
    
    Das kann mit Arbeitskollegen sein oder du lädst Freunde dazu ein. Fika 
    ist ein so bedeutender Teil vom schwedischen Alltag, dass es sowohl als 
    Verb als auch als Nomen verwendet wird. Wie oft machst du Fika?

Links zum Blog anzeigen:

    [Siehe alle Seiten](/blog/)
    [Siehe alle Seiten von Datenstrom](/blog/author:datenstrom/)
    [Siehe Beispiel](/blog/tag:beispiel/)

Neuste Blogseiten anzeigen:

    [blogchanges /blog/]
    [blogchanges /blog/ 3]
    [blogchanges /blog/ 10]

Liste mit Tags anzeigen:

    [blogtags /blog/]
    [blogtags /blog/ 3]
    [blogtags /blog/ 10]

Liste mit Seiten anzeigen:

    [blogpages /blog/]
    [blogpages /blog/ 10 Datenstrom]
    [blogpages /blog/ 10 - Beispiel]

## Entwickler

Datenstrom. [Support finden](https://datenstrom.se/de/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
