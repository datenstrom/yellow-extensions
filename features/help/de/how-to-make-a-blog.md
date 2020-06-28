---
Title: Wie man ein Blog erstellt
---
Lerne wie man ein eigenes Blog erstellt.

## Blog installieren

1. [Datenstrom Yellow herunterladen und entpacken](https://github.com/datenstrom/yellow/archive/master.zip).
2. Kopiere alle Dateien auf deinen Webserver.
3. Öffne deine Webseite im Webbrowser und wähle "Blog" aus.

Dein Blog ist sofort erreichbar. Die Installation kommt mit zwei Seiten, "Startseite" und "Blog". Das ist nur ein Beispiel um loszulegen, verändere alles so wie du willst. Du kannst die Startseite löschen, wenn du das Blog auf der Startseite anzeigen willst.

Falls Probleme auftreten, überprüfe bitte die [Servereinstellungen](troubleshooting) oder frage den [Support](./).
 
## Blogeinträge schreiben

Lass uns einen Blick ins `content`-Verzeichnis werfen, dort befindet sich das Blogverzeichnis mit allen Blogseiten. Öffne die Datei `2013-04-07-blog-example.md`. Es werden Einstellungen und Text der Seite angezeigt. Ganz oben auf der Seite kannst du `Title` und andere [Einstellungen](markdown-cheat-sheet#einstellungen) ändern. Darunter kannst du [Markdown](markdown-cheat-sheet) benutzen. Hier ist ein Beispiel:

```
---
Title: Blog-Beispiel
Published: 2013-04-07
Author: Datenstrom
Layout: blog
Tag: Beispiel
---
Das ist eine Beispiel-Blogseite.

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, 
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. 
```

Um eine neue Blogseite hinzuzufügen, erstellst du eine neue Datei im Blogverzeichnis. Ganz oben auf der Seite solltest du `Published` und weitere Einstellungen ändern. Datumsangaben erfolgen im Format JJJJ-MM-TT. Das Veröffentlichungsdatum wird zur Sortierung der Blogseiten verwendet. Mit `Tag` kann man ähnliche Seiten gruppieren. Hier ein weiteres Beispiel:

```
---
Title: Fika ist gut für dich
Published: 2016-06-01
Author: Datenstrom
Layout: blog
Tag: Beispiel, Kaffee
---
Fika ist ein schwedischer Brauch. Es ist eine Kaffeepause, bei der Menschen  
bei einer Tasse Kaffee oder Tee zusammenkommen. Das kann mit Arbeitskollegen  
sein oder du lädst Freunde dazu ein. Fika ist ein so bedeutender Teil vom 
schwedischen Alltag, dass es sowohl als Verb als auch als Nomen verwendet  
wird. Wie oft machst du Fika?
```

Ein Video hinzufügen mit der [Youtube-Erweiterung](https://github.com/datenstrom/yellow-extensions/tree/master/features/youtube):

```
---
Title: Fika ist gut für dich
Published: 2016-06-01
Author: Datenstrom
Layout: blog
Tag: Beispiel, Kaffee, Video
---
Fika ist ein schwedischer Brauch. Es ist eine Kaffeepause, bei der Menschen  
bei einer Tasse Kaffee oder Tee zusammenkommen. Das kann mit Arbeitskollegen  
sein oder du lädst Freunde dazu ein. Fika ist ein so bedeutender Teil vom 
schwedischen Alltag, dass es sowohl als Verb als auch als Nomen verwendet  
wird. Wie oft machst du Fika?

[youtube wnBHyfMtK5o]
```

Das Video erst anzeigen wenn ein Besucher auf die Blogseite klickt. Du kannst `[--more--]` benutzen, um an der gewünschten Stelle einen Seitenumbruch zu erzeugen:

```
---
Title: Fika ist gut für dich
Published: 2016-06-01
Author: Datenstrom
Layout: blog
Tag: Beispiel, Kaffee, Video
---
Fika ist ein schwedischer Brauch. Es ist eine Kaffeepause, bei der Menschen  
bei einer Tasse Kaffee oder Tee zusammenkommen. Das kann mit Arbeitskollegen  
sein oder du lädst Freunde dazu ein. Fika ist ein so bedeutender Teil vom 
schwedischen Alltag, dass es sowohl als Verb als auch als Nomen verwendet  
wird. Wie oft machst du Fika? [--more--]

[youtube wnBHyfMtK5o]
```

Verwende [Abkürzungen](https://github.com/datenstrom/yellow-extensions/tree/master/features/blog#how-to-show-blog-information), um Informationen über das Blog anzuzeigen.

## Kopfzeile anzeigen

Um eine Kopfzeile anzuzeigen, erstelle die Datei `content/shared/header.md`. Du kannst auch eine `header.md` in deinem Blogverzeichnis erstellen und sie wird nur auf Seiten im gleichen Verzeichnis angezeigt. Hier ist ein Beispiel:

```
---
Title: Header
Status: shared
---
Ich mag Markdown.
```

## Fußzeile anzeigen

Um eine Fußzeile anzuzeigen, erstelle die Datei `content/shared/footer.md`. Du kannst auch eine `footer.md` in deinem Blogverzeichnis erstellen und sie wird nur auf Seiten im gleichen Verzeichnis angezeigt. Hier ist ein Beispiel:

```
---
Title: Footer
Status: shared
---
[Erstellt mit Datenstrom Yellow](https://datenstrom.se/de/yellow/)
```

## Erweiterungen finden

Es gibt [Erweiterungen](https://github.com/datenstrom/yellow-extensions) für dein Blog. Hier sind einige Beispiele:

* [Wie man Kommentare anzeigt](https://github.com/datenstrom/yellow-extensions/tree/master/features/disqus)
* [Wie man eine Suchfunktion benutzt](https://github.com/datenstrom/yellow-extensions/tree/master/features/search)
* [Wie man einen Feed benutzt](https://github.com/datenstrom/yellow-extensions/tree/master/features/feed)
* [Wie man eine Entwurfseite macht](https://github.com/datenstrom/yellow-extensions/tree/master/features/draft)
* [Wie man eine statische Webseite erstellt](https://github.com/datenstrom/yellow-extensions/tree/master/features/command)
