---
Title: API
---
Wir <3 Menschen die programmieren.

[toc]

## Verzeichnisstruktur

Die folgenden Verzeichnisse sind vorhanden:

```
├── content               = Inhaltsdateien
│   ├── 1-home            = Startseite
│   └── shared            = geteilte Dateien
├── media                 = Mediendateien
│   ├── downloads         = Dateien zum Herunterladen
│   ├── images            = Bilder für den Inhalt
│   └── thumbnails        = Miniaturbilder
└── system                = Systemdateien
    ├── extensions        = Erweiterungsdateien
    ├── layouts           = Layoutdateien, HTML-Dateien
    ├── resources         = Resourcendateien, CSS-Dateien, Schriftarten, usw.
    ├── settings          = Konfigurationsdateien, INI-Dateien
    └── trash             = gelöschte Dateien
```

## Objekte

Die folgenden Objekte sind vorhanden:

`$this->yellow->page` = [Zugang zur aktuellen Seite](#yellow-page)  
`$this->yellow->content` = [Zugang zu Inhaltsdateien vom Dateisystem](#yellow-content)  
`$this->yellow->media` = [Zugang zu Mediendateien vom Dateisystem](#yellow-media)  
`$this->yellow->system` = [Zugang zu Systemeinstellungen](#yellow-system)  
`$this->yellow->text` = [Zugang zu Texteinstellungen](#yellow-text)  
`$this->yellow->toolbox` = [Zugang zur Werkzeugkiste mit Helfern](#yellow-toolbox)  
`$this->yellow->extensions` = [Zugang zu Funktionen und Themen](#yellow-extensions)  

### Yellow-Page

Yellow-Page gibt Zugang zur aktuellen Seite:

**$this->yellow->page->get($key)**  
Hole eine [Einstellung](markdown-cheat-sheet#einstellungen) der Seite

**$this->yellow->page->getHtml($key)**  
Hole eine [Einstellung](markdown-cheat-sheet#einstellungen) der Seite, HTML-kodiert  

**$this->yellow->page->getDate($key, $format = "")**  
Hole eine [Einstellung](markdown-cheat-sheet#einstellungen) der Seite als [sprachspezifisches Datumsformat](adjusting-system#texteinstellungen)

**$this->yellow->page->getDateHtml($key, $format = "")**  
Hole eine [Einstellung](markdown-cheat-sheet#einstellungen) der Seite als [sprachspezifisches Datumsformat](adjusting-system#texteinstellungen), HTML-kodiert

**$this->yellow->page->getDateRelative($key, $format = "", $daysLimit = 30)**  
Hole eine [Einstellung](markdown-cheat-sheet#einstellungen) der Seite als [sprachspezifisches Datumsformat](adjusting-system#texteinstellungen), relativ zu heute

**$this->yellow->page->getDateRelativeHtml($key, $format = "", $daysLimit = 30)**  
Hole eine [Einstellung](markdown-cheat-sheet#einstellungen) der Seite als [sprachspezifisches Datumsformat](adjusting-system#texteinstellungen), relativ zu heute, HTML-kodiert

**$this->yellow->page->getDateFormatted($key, $format)**  
Hole eine [Einstellung](markdown-cheat-sheet#einstellungen) der Seite mit [maßgeschneidertem Datumsformat](https://www.php.net/manual/de/function.date.php)

**$this->yellow->page->getDateFormattedHtml($key, $format)**  
Hole eine [Einstellung](markdown-cheat-sheet#einstellungen) der Seite mit [maßgeschneidertem Datumsformat](https://www.php.net/manual/de/function.date.php), HTML-kodiert

**$this->yellow->page->getContent($rawFormat = false, $sizeMax = 0)**  
Hole den Seiteninhalt, HTML-kodiert oder Rohformat

**$this->yellow->page->getParent()**  
Hole die Elternseite, null falls nicht vorhanden

**$this->yellow->page->getParentTop($homeFallback = false)**  
Hole die oberste Elternseite, null falls nicht vorhanden

**$this->yellow->page->getSiblings($showInvisible = false)**  
Hole eine [Page-Collection](#yellow-page-collection) mit Seiten auf dem selben Level

**$this->yellow->page->getChildren($showInvisible = false)**  
Hole eine [Page-Collection](#yellow-page-collection) mit Kinderseiten

**$this->yellow->page->getPages()**  
Hole eine [Page-Collection](#yellow-page-collection) mit zusätzlichen Seiten

**$this->yellow->page->getPage($key)**  
Hole eine zugehörige Seite

**$this->yellow->page->getUrl()**  
Hole die URL der Seite 

**$this->yellow->page->getBase($multiLanguage = false)**  
Hole die Basis der Seite

**$this->yellow->page->getLocation($absoluteLocation = false)**  
Hole den Ort der Seite

**$this->yellow->page->getRequest($key)**  
Hole das Requestargument der Seite

**$this->yellow->page->getRequestHtml($key)**  
Hole das Requestargument der Seite, HTML-kodiert

**$this->yellow->page->getHeader($key)**  
Hole den Responseheader der Seite

**$this->yellow->page->getExtra($name)**  
Hole Extradaten der Seite

**$this->yellow->page->getModified($httpFormat = false)**  
Hole das Änderungsdatum der Seite, Unix-Zeit oder HTTP-Format

**$this->yellow->page->getLastModified($httpFormat = false)**  
Hole das letzte Änderungsdatum der Seite, Unix-Zeit oder HTTP-Format

**$this->yellow->page->getStatusCode($httpFormat = false)**  
Hole den Statuscode der Seite, Zahl oder HTTP-Format

**$this->yellow->page->error($statusCode, $pageError = "")**  
Antworte mit Fehlerseite

**$this->yellow->page->clean($statusCode, location = "")**  
Antworte mit Statuscode, ohne Seiteninhalt

**$this->yellow->page->isAvailable()**  
Teste ob die Seite vorhanden ist

**$this->yellow->page->isVisible()**  
Teste ob die Seite sichtbar ist

**$this->yellow->page->isActive()**  
Teste ob die Seite innerhalb der aktuellen HTTP-Anfrage ist

**$this->yellow->page->isCacheable()**  
Teste ob die Seite cachebar ist

**$this->yellow->page->isError()**  
Teste ob die Seite einen Fehler hat

**$this->yellow->page->isExisting($key)**  
Teste ob die [Einstellung](markdown-cheat-sheet#einstellungen) der Seite existiert  

**$this->yellow->page->isRequest($key)**  
Teste ob das Requestargument existiert

**$this->yellow->page->isHeader($key)**  
Teste ob der Responseheader existiert

**$this->yellow->page->isPage($key)**  
Teste ob die zugehörige Seite existiert

Hier ist ein Beispiel-Layout um den Seiteninhalt anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContent() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um den Seiteninhalt und eine zusätzliche Einstellung anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p><?php echo $this->yellow->page->getHtml("author") ?></p>
<?php echo $this->yellow->page->getContent() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um den Seiteninhalt und ein zusätzliches Datum anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p><?php echo $this->yellow->page->getDateHtml("modified", "coreDateFormatMedium") ?></p>
<?php echo $this->yellow->page->getContent() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow-Page-Collection

Yellow-Page-Collection gibt Zugang zu mehreren Seiten:

**$pages->filter($key, $value, $exactMatch = true)**  
Filtere eine Page-Collection nach [Einstellung](markdown-cheat-sheet#einstellungen)

**$pages->match($regex = "/.*/")**  
Filtere eine Page-Collection nach Dateinamen

**$pages->sort($key, $ascendingOrder = true)**  
Sortiere eine Page-Collection nach [Einstellung](markdown-cheat-sheet#einstellungen)

**$pages->similar($page, $ascendingOrder = false)**  
Sortiere eine Page-Collection nach [Einstellungsähnlichkeit](markdown-cheat-sheet#einstellungen)

**$pages->merge($input)**  
Berechne Vereinigungsmenge, füge eine Page-Collection hinzu

**$pages->intersect($input)**  
Berechne Schnittmenge, entferne Seiten die nicht in einer anderen Page-Collection sind

**$pages->diff($input)**  
Berechne Restmenge, entferne Seiten die in einer anderen Page-Collection sind

**$pages->append($page)**  
Hänge an das Ende der Page-Collection

**$pages->prepend($page)**  
Stelle an den Anfang der Page-Collection

**$pages->limit($pagesMax)**  
Begrenze die Anzahl der Seiten in der Page-Collection

**$pages->reverse()**  
Drehe die Page-Collection um

**$pages->shuffle()**  
Mach die Page-Collection zufällig

**$pages->pagination($limit, $reverse = true)**  
Erstelle eine Pagination für die Page-Collection

**$pages->getPaginationNumber()**  
Hole die aktuelle Seitennummer in der Pagination

**$pages->getPaginationCount()**  
Hole die höchste Seitennummer in der Pagination

**$pages->getPaginationLocation($absoluteLocation = true, $pageNumber = 1)**  
Hole den Ort einer Seite in der Pagination

**$pages->getPaginationPrevious($absoluteLocation = true)**  
Hole den Ort der vorherigen Seite in der Pagination

**$pages->getPaginationNext($absoluteLocation = true)**  
Hole den Ort der nächsten Seite in der Pagination

**$pages->getPagePrevious($page)**  
Hole die vorherige Seite in der Page-Collection, null falls nicht vorhanden

**$pages->getPageNext($page)**  
Hole die nächste Seite in der Page-Collection, null falls nicht vorhanden

**$pages->getFilter()**  
Hole den aktuellen Seitenfilter

**$pages->getModified($httpFormat = false)**  
Hole das Änderungsdatum der Page-Collection, Unix-Zeit oder HTTP-Format

**$pages->isPagination()**  
Teste ob eine Pagination vorhanden ist

Hier ist ein Beispiel-Layout um drei zufällige Seiten anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index()->shuffle()->limit(3) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um die neusten Seiten anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index()->sort("modified", false) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um Entwurfseiten anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index(true, true)->filter("status", "draft") ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow-Content

Yellow-Content gibt Zugang zu [Inhaltsdateien](adjusting-content) vom Dateisystem:

**$this->yellow->content->find($location, $absoluteLocation = false)**  
Hole eine [Page](#yellow-page) vom Dateisystem, null falls nicht vorhanden

**$this->yellow->content->index($showInvisible = false, $multiLang = false, $levelMax = 0)**  
Hole eine [Page-Collection](#yellow-page-collection) mit allen Seiten

**$this->yellow->content->top($showInvisible = false, $showOnePager = true)**  
Hole eine [Page-Collection](#yellow-page-collection) mit Hauptseiten der Navigation

**$this->yellow->content->path($location, $absoluteLocation = false)**  
Hole eine [Page-Collection](#yellow-page-collection) mit Pfad in der Navigation

**$this->yellow->content->multi($location, $absoluteLocation = false, $showInvisible = false)**  
Hole eine [Page-Collection](#yellow-page-collection) mit mehreren Sprachen im Mehrsprachen-Modus

**$this->yellow->content->shared($name)**  
Hole eine [Page](#yellow-page) mit geteiltem Inhalt, null falls nicht vorhanden  

**$this->yellow->content->clean()**  
Hole eine [Page-Collection](#yellow-page-collection) die leer ist

Hier ist ein Beispiel-Layout um alle Seiten anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index(true, true) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um Seiten unterhalb eines bestimmten Orts anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->find("/help/")->getChildren(true) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um die Hauptseiten der Navigation anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->top() ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("titleNavigation") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow-Media

Yellow-Media gibt Zugang zu [Mediendateien](adjusting-media) vom Dateisystem:

**$this->yellow->media->find($location, $absoluteLocation = false)**  
Hole eine [Page](#yellow-page) mit Informationen über Mediendatei, null falls nicht vorhanden

**$this->yellow->media->index($showInvisible = false, $multiPass = false, $levelMax = 0)**  
Hole eine [Page-Collection](#yellow-page-collection) mit allen Mediendateien

**$this->yellow->media->clean()**  
Hole eine [Page-Collection](#yellow-page-collection) die leer ist

Hier ist ein Beispiel-Layout um alle Mediendateien anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $files = $this->yellow->media->index(true) ?>
<?php $this->yellow->page->setLastModified($files->getModified()) ?>
<ul>
<?php foreach ($files as $file): ?>
<li><?php echo $file->getLocation(true) ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um die neusten Mediendateien anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $files = $this->yellow->media->index(true)->sort("modified", false) ?>
<?php $this->yellow->page->setLastModified($files->getModified()) ?>
<ul>
<?php foreach ($files as $file): ?>
<li><?php echo $file->getLocation(true) ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um Mediendateien eines bestimmten Typen anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $files = $this->yellow->media->index(true)->filter("type", "pdf") ?>
<?php $this->yellow->page->setLastModified($files->getModified()) ?>
<ul>
<?php foreach ($files as $file): ?>
<li><?php echo $file->getLocation(true) ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow-System

Yellow-System gibt Zugang zu [Systemeinstellungen ](adjusting-system#systemeinstellungen):

**$this->yellow->system->get($key)**  
Hole eine Systemeinstellung

**$this->yellow->system->getHtml($key)**  
Hole eine Systemeinstellung, HTML-kodiert

**$this->yellow->system->getData($filterStart = "", $filterEnd = "")**  
Hole Systemeinstellungen

**$this->yellow->system->getModified($httpFormat = false)**  
Hole das Änderungsdatum von Systemeinstellungen, Unix-Zeit oder HTTP-Format

**$this->yellow->system->isExisting($key)**  
Teste ob die Systemeinstellung existiert

Hier ist ein Beispiel-Layout um statische Webseiten-Einstellungen anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->system->getData("static") as $key=>$value): ?>
<?php echo htmlspecialchars("$key: $value") ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um Webmaster-Einstellungen anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php echo "Author: ".$this->yellow->system->getHtml("author")."<br />" ?>
<?php echo "Email: ".$this->yellow->system->getHtml("email")."<br />" ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um anzuzeigen ob der Mehrsprachen-Modus aktiviert ist:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php $multiLanguageMode = $this->yellow->system->get("coreMultiLanguageMode") ?>
Multi language mode is <?php echo htmlspecialchars($multiLanguageMode ? "on" : "off") ?>.
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow-Text

Yellow-Text gibt Zugang zu [Texteinstellungen](adjusting-system#texteinstellungen):

**$this->yellow->text->get($key)**  
Hole einen Textstring

**$this->yellow->text->getHtml($key)**  
Hole einen Textstring, HTML-kodiert

**$this->yellow->text->getText($key, $language )**  
Hole einen Textstring für eine bestimmte Sprache

**$this->yellow->text->getTextHtml($key, $language )**  
Hole einen Textstring für eine bestimmte Sprache, HTML-kodiert

**$this->yellow->text->getData($filterStart = "", $language = "")**  
Hole Textstrings

**$this->yellow->text->getModified($httpFormat = false)**  
Hole das Änderungsdatum von Text, Unix-Zeit oder HTTP-Format

**$this->yellow->text->getLanguages()**  
Hole Sprachen

**$this->yellow->text->isLanguage($language)**  
Teste ob die Sprache existiert

**$this->yellow->text->isExisting($key, $language = "")**  
Teste ob der Textstring existiert

Hier ist ein Beispiel-Layout um Fehlermeldungen anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->text->getData("error") as $key=>$value): ?>
<?php echo htmlspecialchars("$key: $value") ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um Sprachen und Übersetzer anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->text->getLanguages() as $language): ?>
<?php echo $this->yellow->text->getTextHtml("languageDescription", $language) ?> - 
<?php echo $this->yellow->text->getTextHtml("languageTranslator", $language) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um zu testen ob eine bestimmte Sprache existiert:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $swedish = $this->yellow->text->isLanguage("sv") ?>
<p>Swedish language <?php echo htmlspecialchars($swedish ? "" : "not") ?> installed.</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow-Toolbox

Yellow-Toolbox gibt Zugang zur Werkzeugkiste mit Helfern:

**$this->yellow->toolbox->getCookie($key)**   
Hole das Browsercookie der aktuellen HTTP-Anfrage

**$this->yellow->toolbox->getServer($key)**   
Hole das Serverargument der aktuellen HTTP-Anfrage

**$this->yellow->toolbox->normaliseArguments($text, $appendSlash = true, $filterStrict = true)**  
Normalisiere Ortargumente

**$this->yellow->toolbox->getDirectoryEntries($path, $regex = "/.*/", $sort = true, $directories = true, $includePath = true)**  
Hole Dateien und Verzeichnisse

**$this->yellow->toolbox->readFile($fileName, $sizeMax = 0)**  
Lese eine Datei, leerer String falls nicht vorhanden

**$this->yellow->toolbox->createFile($fileName, $fileData, $mkdir = false)**  
Erstelle eine Datei

**$this->yellow->toolbox->appendFile($fileName, $fileData, $mkdir = false)**  
Hänge an eine Datei an

**$this->yellow->toolbox->copyFile($fileNameSource, $fileNameDestination, $mkdir = false)**  
Kopiere eine Datei  

**$this->yellow->toolbox->renameFile($fileNameSource, $fileNameDestination, $mkdir = false)**  
Benenne eine Datei um

**$this->yellow->toolbox->renameDirectory($pathSource, $pathDestination, $mkdir = false)**  
Benenne ein Verzeichnis um  

**$this->yellow->toolbox->deleteFile($fileName, $pathTrash = "")**  
Lösche eine Datei

**$this->yellow->toolbox->deleteDirectory($path, $pathTrash = "")**  
Lösche ein Verzeichnis  

**$this->yellow->toolbox->modifyFile($fileName, $modified)**  
Setze das Änderungsdatum der Datei, Unix-Zeit

**$this->yellow->toolbox->getFileModified($fileName)**  
Hole das Änderungsdatum der Datei, Unix-Zeit

**$this->yellow->toolbox->getTextLines($text)**  
Hole die Zeilen eines Textstrings, einschließlich Zeilenumbruch  

**$this->yellow->toolbox->getTextList($text, $separator, $size)**  
Hole ein Array mit bestimmter Grösse aus einem Textstring  

**$this->yellow->toolbox->getTextArguments($text, $optional = "-", $sizeMin = 9)**  
Hole die Argumente aus einem Textstring, durch Leerzeichen getrennt  

Hier ist ein Beispiel-Layout um Dateien in einem Verzeichnis anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php $path = $this->yellow->system->get("coreSettingDirectory") ?>
<?php foreach ($this->yellow->toolbox->getDirectoryEntries($path, "/.*/", true, false) as $entry): ?>
<?php echo htmlspecialchars($entry) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um Textzeilen von einer Datei zu lesen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php $fileName = $this->yellow->system->get("coreSettingDirectory").$this->yellow->system->get("coreSystemFile") ?>
<?php $fileData = $this->yellow->toolbox->readFile($fileName) ?>
<?php foreach ($this->yellow->toolbox->getTextLines($fileData) as $line): ?>
<?php echo htmlspecialchars($line) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow-Extensions

Yellow-Extensions gibt Zugang zu Funktionen und Themen:

**$this->yellow->extensions->get($name)**  
Hole eine Erweiterung

**$this->yellow->extensions->getData($type = "")**  
Hole die Versionsinformation von Erweiterungen

**$this->yellow->extensions->getModified($httpFormat = false)**  
Hole das Änderungsdatum von Erweiterungen, Unix-Zeit oder HTTP-Format

**$this->yellow->extensions->getExtensions($type = "")**  
Hole Erweiterungen

**$this->yellow->extensions->isExisting($name)**  
Teste ob die Erweiterung existiert

Hier ist ein Beispiel-Layout um Informationen über Erweiterungen anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach($this->yellow->extensions->getData() as $key=>$value): ?>
<?php echo htmlspecialchars("$key $value") ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist eine Beispiel-Erweiterung um eigene Funktionen zu erstellen:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.0";
    const TYPE = "feature";
}
```

Hier ist eine Beispiel-Erweiterung um eigene Themen zu erstellen:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.0";
    const TYPE = "theme";
}
```


## Ereignisse

Die folgenden Ereignisse sind vorhanden in Erweiterungen:

```
onLoad ───────▶ onStartup ─────────────────────────────────────────┐
                    │                                              │
                    ▼                                              │
                onRequest ─────────────────┐                       │
                    │                      │                       │
                    ▼                      ▼                       ▼
                onParseMeta             onEditContentFile      onCommand
                onParseContentRaw       onEditMediaFile        onCommandHelp
                onParseContentShortcut  onEditSystemFile           │
                onParseContentText      onEditUserAccount          │
                onParsePageLayout          │                       ▼
                onParsePageExtra           │                   onLog
                onParsePageOutput          │                   onUpdate
                    │                      │                       │
                    ▼                      │                       │
exit ◀───────── onShutDown ◀───────────────┴───────────────────────┘
```

Wird eine Seite angezeigt, dann werden die Erweiterungen geladen und es wird `onLoad` aufgerufen. Sobald alle Erweiterungen geladen sind wird `onStartup` aufgerufen. Danach informiert der Core mit `onRequest` dass es eine Anfrage gibt. Die Seite kann mit verschiedenen `onParse`-Ereignissen analysiert werden. Dann wird der Inhalt der Seite erzeugt. Sollte ein Fehler auftreten, wird eine Fehlerseite erzeugt. Zum Schluss wird die Seite ausgegeben und es wird `onShutdown` aufgerufen.

Wird eine Seite bearbeitet, dann werden die Erweiterungen geladen und es wird `onLoad` aufgerufen. Sobald alle Erweiterungen geladen sind wird `onStartup` aufgerufen. Danach informiert der Core mit `onRequest` dass es eine Anfrage gibt, welche von der [Edit-Erweiterung](https://github.com/datenstrom/yellow-extensions/tree/master/features/edit) behandelt wird. Änderungen an der Seite können mit verschiedenen `onEdit`-Ereignissen überprüft werden. Dann wird die Seite im Dateisystem gespeichert. Zum Schluss wird ein Statuscode zum Neuladen der Seite ausgegeben und es wird `onShutdown` aufgerufen.

Wird ein Befehl ausgeführt, dann werden die Erweiterungen geladen und es wird `onLoad` aufgerufen. Sobald alle Erweiterungen geladen sind wird `onStartup` aufgerufen. Danach informiert der Core mit `onCommand` dass es einen Befehl gibt, welcher von der entsprechenden Erweiterung behandelt wird. Sollte kein Befehl in der [Befehlszeile](https://github.com/datenstrom/yellow-extensions/tree/master/features/command) eingegeben worden sein, dann wird `onCommandHelp` aufgerufen und Erweiterungen können eine Hilfe zur Verfügung stellen. Zum Schluss wird ein Rückgabecode ausgegeben und es wird `onShutdown` aufgerufen.

### Yellow-Core-Ereignisse

Yellow-Core-Ereignisse unterrichten wenn sich ein Zustand ändert:

**public function onLoad($yellow)**  
Behandle die Initialisierung

**public function onStartup()**  
Behandle das Hochfahren

**public function onRequest($scheme, $address, $base, $location, $fileName)**  
Behandle die Anfrage

**public function onParseMeta($page)**  
Behandle die [Metadaten](markdown-cheat-sheet#einstellungen) einer Seite

**public function onParseContentRaw($page, $text)**  
Behandle den Seiteninhalt im Rohformat

**public function onParseContentShortcut($page, $name, $text, $type)**  
Behandle den Seiteninhalt einer [Abkürzung](markdown-cheat-sheet#abkürzungen)

**public function onParseContentText($page, $text)**  
Behandle den Seiteninhalt

**public function onParsePageLayout($page, $name)**  
Behandle das [Layout](html-files) einer Seite

**public function onParsePageExtra($page, $name)**  
Behandle die Extradaten einer Seite

**public function onParsePageOutput($page, $text)**  
Behandle die Ausgabedaten einer Seite

**public function onLog($action, $message)**  
Behandle das Logging

**public function onUpdate($action)**  
Behandle die Aktualisierung

**public function onShutdown()**  
Behandle das Runterfahren

Hier ist eine Beispiel-Erweiterung um eine `[example]`-Abkürzung zu behandeln:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.1";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }

    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="example" && ($type=="block" || $type=="inline")) {
            $output = "<div class=\"".htmlspecialchars($name)."\">";
            $output .= "Add more HTML code here";
            $output .= "</div>";
        }
        return $output;
    }
}
```

### Yellow-Edit-Ereignisse

Yellow-Edit-Ereignisse unterrichten wenn eine Seite im Webbrowser bearbeitet wird:

**public function onEditContentFile($page, $action)**  
Behandle Änderungen an [Inhaltsdatei](adjusting-content)

**public function onEditMediaFile($file, $action)**  
Behandle Änderungen an [Mediendatei](adjusting-media)

**public function onEditSystemFile($file, $action)**  
Behandle Änderungen an [Systemdatei](adjusting-system)

**public function onEditUserAccount($email, $password, $action, $users)**  
Behandle Änderungen am [Benutzerkonto](adjusting-system#benutzerkonten)

Hier ist eine Beispiel-Erweiterung um eine Datei zu behandeln:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.3";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle media file changes
    public function onEditMediaFile($file, $action) {
        if ($action=="upload") {
            $fileName = $file->fileName;
            $fileType = $this->yellow->toolbox->getFileType($file->get("fileNameShort"));
            // Add more PHP code here
        }
    }
}
```

### Yellow-Command-Ereignisse

Yellow-Command-Ereignisse unterrichten wenn ein Befehl ausgeführt wird:

**public function onCommand($command, $text)**  
Behandle Befehle

**public function onCommandHelp()**  
Behandle Hilfe für Befehle


Hier ist eine Beispiel-Erweiterung um einen Befehl zu behandeln:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.2";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }

    // Handle command help
    public function onCommandHelp() {
        return "example\n";
    }
    
    // Handle command
    public function onCommand($command, $text) {
        $statusCode = 0;
        if ($command=="example") {
            echo "Yellow $command: Add more text here\n";
            $statusCode = 200;
        }
        return $statusCode;
    }
}
```
