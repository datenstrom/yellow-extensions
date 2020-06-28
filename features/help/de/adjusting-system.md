---
Title: System anpassen
---
Alle Einstellungen befinden sich im `system`-Verzeichnis. Hier macht man Anpassungen.

    ├── content
    ├── media
    └── system
        ├── extensions
        ├── layouts
        ├── resources
        ├── settings
        └── trash

Das `extensions`-Verzeichnis enthält installierte Erweiterungen. Im `layouts`-Verzeichnis und im `resources`-Verzeichnis kann man das Aussehen seiner Webseite anpassen. Das `settings`-Verzeichnis enthält Konfigurationsdateien. Das `trash`-Verzeichnis enthält gelöschte Dateien.

## Systemeinstellungen

Die zentrale Konfigurationsdatei ist `system/settings/system.ini`. Hier ist ein Beispiel:

    Sitename: Anna Svensson Design
    Author: Anna Svensson
    Email: anna@svensson.de
    Language: de
    Layout: default
    Theme: berlin
    Parser: markdown
    Status: public

Dort kannst du die Systemeinstellungen festlegen, zum Beispiel den Namen der Webseite und die E-Mail des Webmasters. Die individuellen [Einstellungen](markdown-cheat-sheet#einstellungen) lassen sich ganz oben auf jeder Seite festlegen. Bei einer neuen Installation sollte man `Sitename`, `Author` und `Email` anpassen.

## Texteinstellungen

Eine weitere Konfigurationsdatei ist `system/settings/text.ini`. Hier ist ein Beispiel:

    Language: de
    CoreDateFormatMedium: d.m.Y
    picture.jpg: Das ist ein Beispielbild

Dort kannst du die Texteinstellungen festlegen, zum Beispiel Textabschnitte und Bildunterschriften. Texteinstellungen bestehen aus `Language` und weiteren Einstellungen. Du kannst beliebige Texte festlegen oder die [Voreinstellungen](https://github.com/datenstrom/yellow-extensions/blob/master/languages/german/german-language.txt) von Sprachen anpassen.

## Benutzerkonten

Alle Benutzerkonten sind in `system/settings/user.ini` gespeichert. Hier ist ein Beispiel:

    Email: anna@svensson.com
    Name: Anna Svensson
    Language: de
    Home: /
    Access: create, edit, delete, upload, system, update
    Hash: $2y$10$j26zDnt/xaWxC/eqGKb9p.d6e3pbVENDfRzauTawNCUHHl3CCOIzG
    Stamp: 21196d7e857d541849e4
    Pending: none
    Failed: 0
    Modified: 2000-01-01 13:37:00
    Status: active

Im [Webbrowser](https://github.com/datenstrom/yellow-extensions/tree/master/features/edit) und der [Befehlszeile](https://github.com/datenstrom/yellow-extensions/tree/master/features/command) kannst du neue Benutzerkonten anlegen und Kennwörter ändern. Ein Benutzerkonto besteht aus `Email` und weiteren Einstellungen. Falls du nicht willst dass alle Webseiten im Webbrowser bearbeitet werden, dann ändere die Startseite des Benutzers.
