Core 0.8.13
===========
Kernfunktionalität der Webseite.

<p align="center"><img src="core-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man diese Erweiterung installiert

1. [Datenstrom Yellow herunterladen und installieren](https://github.com/datenstrom/yellow/).
2. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/core.zip). Falls du Safari verwendest, rechtsklicke und wähle "Verknüpfte Datei laden unter".
3. Kopiere `core.zip` in dein `system/extensions`-Verzeichnis.

Die [Erweiterungsdateien](extension.ini) bitte nicht löschen, sie werden immer gebraucht.

## Wie man eine Webseite anpasst

Falls du den Inhalt anpassen willst, kannst du [Markdown](https://github.com/datenstrom/yellow-extensions/tree/master/features/markdown/README-de.md) benutzen. Alle Inhalte befinden sich im `content`-Verzeichnis. Erstelle die Datei `content/shared/header.md` für eine Kopfzeile. Erstelle die Datei `content/shared/footer.md` für eine Fußzeile. Du kannst eine Kopfzeile und Fußzeile auch in einem anderen Verzeichnis erstellen, dann wir sie nur auf Seiten im gleichen Verzeichnis angezeigt. Manche Themen habe Unterstützung für Kopfzeile, Fußzeile und Sidebar.

Falls du HTML anpassen willst, ändere das Layout. Das Standardlayout wird in der Datei `system/settings/system.ini` festgelegt. Eine anderes Layout lässt sich in den [Einstellungen](#einstellungen) ganz oben auf jeder Seite festlegen, zum Beispiel `Layout: default`. Alle Layoutdateien befinden sich im `system/layouts`-Verzeichnis. Natürlich gibt es eine [API für Entwickler](https://github.com/datenstrom/yellow-extensions/tree/master/features/help/README-de.md), beispielsweise um eine eigene Navigation zu erstellen.

Falls du CSS anpassen willst, ändere das Thema. Das Standardthema wird in der Datei `system/settings/system.ini` festgelegt. Eine anderes Thema lässt sich in den [Einstellungen](#einstellungen) ganz oben auf jeder Seite festlegen, zum Beispiel `Theme: berlin`. Streng genommen bestehen Themen nicht nur aus CSS, sondern aus mehreren Dateien. Alle Resourcendateien befinden sich im `system/resources`-Verzeichnis. Es gibt [Themen](https://github.com/datenstrom/yellow-extensions/blob/master/themes/README-de.md) zum Herunterladen.

## Wie man eine mehrsprachige Webseite macht

Deine Webseite kommt mit drei Sprachen und man kann weitere [Sprachen](https://github.com/datenstrom/yellow-extensions/tree/master/languages/README-de.md) installieren. Die Standardsprache wird in der Datei `system/settings/system.ini` festgelegt. Eine andere Sprache lässt sich in den [Einstellungen](#einstellungen) ganz oben auf jeder Seite festlegen, zum Beispiel `Language: de`.

Falls du die gesamte Webseite in mehrere Sprachen übersetzen willst, aktiviere den Mehrsprachen-Modus. Öffne die Datei `system/settings/system.ini` und ändere `CoreMultiLanguageMode: 1`. Danach musst du die [Verzeichnisstruktur](#verzeichnisse) anpassen. Gehe ins `content`-Verzeichnis und erstelle ein neues Verzeichnis für jede Sprache.

Falls du Text anpassen willst, ändere die Texteinstellungen. Öffne die Datei `system/settings/text.ini` und ändere die vorhandenen Einstellungen. Du kannst die [Standardeinstellungen aus Sprachdateien](https://github.com/datenstrom/yellow-extensions/blob/master/languages/german/german-language.txt) kopieren und in diese Datei einfügen. Du kannst auch deine eigenen Texteinstellungen hinzufügen, beispielsweise Bildunterschriften.

## Wie man eine sichere Webseite macht

[Halte deine Webseite auf dem neuesten Stand](https://github.com/datenstrom/yellow-extensions/tree/master/features/update/README-de.md). Es wird empfohlen die Webseite zu aktualisieren sobald ein neues Release bereit steht. Überprüfe ausserdem ob deine Webseite Datenverschlüsselung unterstützt. Am Besten ist es wenn die Internetverbindung immer mit HTTPS verschlüsselt wird. Falls Probleme auftreten, kontaktiere bitte deinen Webhoster.

Falls du nicht willst dass Seiten verändert werden, [beschränke Benutzerkonten](https://github.com/datenstrom/yellow-extensions/tree/master/features/edit/README-de.md). Du kannst festlegen was Benutzer machen dürfen, welche Seiten verändert und welche Dateien hochgeladen werden dürfen. Die Dateiformate GIF, JPG, PDF, PNG, SVG und ZIP werden in den Standardeinstellungen unterstützt.

Falls du nicht so viele Spam-Nachrichten bekommen willst, [beschränke die Kontaktseite](https://github.com/datenstrom/yellow-extensions/tree/master/features/contact/README-de.md). Du kannst bestimmen wer Nachrichten empfangen darf und ob sie anklickbare Links enthalten dürfen. Es ist empfehlenswert Links zu beschränken, das blockiert viele unerwünschte Nachrichten.

## Wie man eine Seite versteckt

Ganz oben auf einer Seite kannst du `Status: unlisted` in den [Einstellungen](#einstellungen) festlegen. Die Seite ist dann in der Navigation und den Suchergebnissen nicht mehr sichtbar. Du kannst zwischen verschiedenen [Statuswerten](#einstellungen-status) wählen, um zu bestimmen wer eine Seite sehen und darauf zugreifen kann.

## Wie man eine Seite weiterleitet

Ganz oben auf einer Seite kannst du `Redirect` in den [Einstellungen](#einstellungen) festlegen. Die Seite wird dann zu einer anderen Seite oder URL weitergeleitet. Du kannst die Seite weiterhin im [Webbrowser](https://github.com/datenstrom/yellow-extensions/tree/master/features/edit/README-de.md) und im Dateisystem bearbeiten.

## Verzeichnisse

Die folgenden Verzeichnisse sind verfügbar:

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

Verzeichnisstruktur für mehrsprachige Webseite:

```
├── content               
│   ├── 1-en              
│   │   ├── 1-home        = http://website/
│   │   └── shared    
│   ├── 2-de              
│   │   ├── 1-home        = http://website/de/
│   │   └── shared    
│   └── 3-fr              
│       ├── 1-home        = http://website/fr/
│       └── shared    
├── media                 
└── system                
```

Verzeichnisstruktur für mehrsprachige Webseite, mit automatischer Spracherkennung:

```
├── content               
│   ├── 1-en              
│   │   ├── 1-home        = http://website/en/
│   │   └── shared    
│   ├── 2-de              
│   │   ├── 1-home        = http://website/de/
│   │   └── shared    
│   ├── 3-fr              
│   │   ├── 1-home        = http://website/fr/
│   │   └── shared    
│   └── default           = http://website/
├── media                 
└── system                
```

## Einstellungen

Die folgenden Einstellungen können ganz oben auf einer Seite vorgenommen werden:

`Title` = Seitentitel  
`TitleContent` = Seitentitel der im Inhalt angezeigt wird  
`TitleNavigation` = Seitentitel der in der Navigation angezeigt wird  
`TitleHeader` = Seitentitel der im Webbrowser angezeigt wird  
`TitleSlug` = Seitentitel zum Speichern der Seite  
`Description` = Beschreibung der Seite  
`Author` = Autoren der Seite, durch Komma getrennt  
`Email` = E-Mail des Seitenautors  
`Language` = Sprache der Seite  
`Layout` = Layout der Seite  
`LayoutNew` = Layout um eine neue Seite zu erzeugen  
`Theme` = Thema der Seite  
`Parser` = Parser der Seite  
`Status` = Status der Seite, [unterstütze Statuswerte](#einstellungen-status)  
`Redirect` = Weiterleitung zu einer anderen Seite oder URL  
`Image` = Bild der Seite  
`ImageAlt` = Alternative Bildbeschreibung der Seite  
`Modified` = Änderungsdatum der Seite, JJJJ-MM-TT Format  
`Published` = Veröffentlichungsdatum der Seite, JJJJ-MM-TT Format  
`Tag` = Tags zur Kategorisierung der Seite, durch Komma getrennt  
`Build` = Optionen zum Erstellen einer [statischen Webseite](https://github.com/datenstrom/yellow-extensions/tree/master/features/command/README-de.md), durch Komma getrennt  

<a id="einstellungen-system"></a>Die folgenden Einstellungen können in der Datei `system/settings/system.ini` vorgenommen werden:

`Sitename` = Name der Webseite  
`Author` = Name des Webmasters  
`Email` = E-Mail des Webmasters  
`Language` = Standard-Sprache  
`Layout` = Standard-Layout  
`Theme` = Standard-Theme  
`Parser` = Standard-Seitenparser  
`Status` = Standard-Seitenstatus, [unterstütze Statuswerte](#einstellungen-status)  
`CoreStaticUrl` = URL der [statischen Webseite](https://github.com/datenstrom/yellow-extensions/tree/master/features/command/README-de.md)  
`CoreStaticDefaultFile` =  Standard-Datei der statischen Webseite  
`CoreStaticErrorFile` = Fehler-Datei der statischen Webseite  
`CoreStaticDirectory` = Verzeichnis für erzeugte Dateien  
`CoreCacheDirectory` = Verzeichnis für zwischengespeicherte Dateien  
`CoreTrashDirectory` = Verzeichnis für gelöschte Dateien  
`CoreServerUrl` = URL der Webseite, `auto` für automatische Erkennung  
`CoreServerTimezone` = Zeitzone der Webseite  
`CoreMultiLanguageMode` = Mehrsprachen-Modus aktivieren, 1 oder 0  

<a id="einstellungen-text"></a>Die folgenden Einstellungen können in der Datei `system/settings/text.ini` vorgenommen werden:

`CoreDateFormatShort` = kurzes Datumsformat  
`CoreDateFormatMedium` = mittleres Datumsformat, normalerweise 01.06.2016  
`CoreDateFormatLong` = langes Datumsformat  
`CoreTimeFormatShort` = kurzes Zeitformat  
`CoreTimeFormatMedium` = mittleres Zeitformat, normalerweise 13:37:01  
`CoreTimeFormatLong` = langes Zeitformat  

<a id="einstellungen-status"></a>Die folgenden Seiten-Statuswerte werden unterstützt:

`public` = Seite ist eine normale Seite  
`private` = Seite ist nicht sichtbar, Benutzer muss das Kennwort eingeben, erfordert [Private-Erweiterung](https://github.com/schulle4u/yellow-extensions-schulle4u/tree/master/private/README-de.md)  
`draft` = Seite ist nicht sichtbar, Benutzer muss sich einloggen, erfordert [Draft-Erweiterung](https://github.com/datenstrom/yellow-extensions/tree/master/features/draft/README-de.md)  
`unlisted` = Seite ist nicht sichtbar, aber kann mit dem richtigen Link abgerufen werden  
`shared` = Seite ist nicht vorhanden, aber kann in andere Seiten eingebunden werden  

<a id="einstellungen-files"></a>Die folgenden Dateien können angepasst werden:

`system/layouts/default.html` = Layoutdatei für Standard-Seite  
`system/layouts/error.html` = Layoutdatei für Standard-Fehlerseite  
`system/layouts/header.html` = Layoutdatei für Standard-HTML-Header  
`system/layouts/footer.html` = Layoutdatei für Standard-HTML-Footer  
`system/layouts/navigation.html` = Layoutdatei für Standard-Navigation  
`system/layouts/pagination.html` = Layoutdatei für Standard-Pagination  

## Beispiele

Inhaltsdatei mit normaler Seite:

    ---
    Title: Normale Seite
    ---
    Das ist eine Beispielseite.

Inhaltsdatei mit ungelisteter Seite:

    ---
    Title: Ungelistete Seite
    Status: unlisted
    ---
    Diese Seite ist in der Navigation und den Suchergebnissen nicht sichtbar.

Inhaltsdatei mit Kopfzeile:

    ---
    Title: Header
    Status: shared
    ---
    Ich mag Markdown.

Inhaltsdatei mit Fußzeile:

    ---
    Title: Footer
    Status: shared
    ---
    [Erstellt mit Datenstrom Yellow](https://datenstrom.se/de/yellow/)

Inhaltsdatei mit Weiterleitung:

    ---
    Title: Seite weiterleiten
    Redirect: https://datenstrom.se/de/yellow/
    ---
    Diese Seite wird zu einer anderen Seite weitergeleitet.

Inhaltsdatei mit Optionen zum Erstellen einer statischen Webseite:

    ---
    Title: Beispielseite
    Build: exclude
    ---
    Diese Seite wird beim Erstellen einer statischen Webseite nicht berücksichtigt.

Texteinstellungen festlegen:

    Language: de
    CoreDateFormatMedium: d.m.Y
    picture.jpg: Dies ist ein Beispielbild

## Entwickler

Datenstrom. [Support finden](https://datenstrom.se/de/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
