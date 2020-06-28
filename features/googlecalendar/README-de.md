Googlecalendar 0.8.6
====================
Google-Kalender einbinden.

<p align="center"><img src="googlecalendar-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man diese Erweiterung installiert

1. [Datenstrom Yellow herunterladen und installieren](https://github.com/datenstrom/yellow/).
2. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/googlecalendar.zip). Falls du Safari verwendest, rechtsklicke und wähle "Verknüpfte Datei laden unter".
3. Kopiere `googlecalendar.zip ` in dein `system/extensions`-Verzeichnis.

Zum Deinstallieren lösche einfach die [Erweiterungsdateien](extension.ini).

## Wie man einen Kalender einbindet

Erstelle eine `[googlecalendar]`-Abkürzung.

Die folgenden Argumente sind verfügbar, alle bis auf das erste Argument sind optional:

`Id` = öffentlicher [Google Calendar](https://calendar.google.com/), mehrere Kalender in Anführungszeichen setzen  
`Mode` = Kalendermodus, z.B. `week`, `month`, `events`, `agenda`  
`Date` = Startdatum oder Anzahl der Ereignisse, JJJ-MM-TT Format  
`Style` = Kalenderstil, z.B. `left`, `center`, `right`  
`Width` = Kalenderbreite, Pixel oder Prozent  
`Height` = Kalenderhöhe, Pixel oder Prozent  

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/settings/system.ini` vorgenommen werden:

`GooglecalendarMode` = Kalendermodus, z.B. `week`, `month`, `events`, `agenda`  
`GooglecalendarEntriesMax` = Anzahl der Einträge  
`GooglecalendarStyle` = Kalenderstil, z.B. `flexible`  
`GooglecalendarApiKey` = dein Google-API-Schlüssel  

## Beispiele

Kalender einbinden:

    [googlecalendar en.swedish#holiday]
    [googlecalendar en.swedish#holiday week]
    [googlecalendar en.swedish#holiday month - right 240 240]

Kalender einbinden, mehrere Kalender zusammen:

    [googlecalendar "sv.swedish#holiday, de.german#holiday, fr.french#holiday"]
    [googlecalendar "sv.swedish#holiday, de.german#holiday, fr.french#holiday" week 2017-01-01]
    [googlecalendar "sv.swedish#holiday#0044AA, de.german#holiday#AA0000, fr.french#holiday#00AA00" month 2017-01-01]

Kalender einbinden, Events und Agenda:

    [googlecalendar de.german#holiday events]
    [googlecalendar de.german#holiday events 10]
    [googlecalendar de.german#holiday agenda 10]

## Entwickler

Datenstrom. [Support finden](https://datenstrom.se/de/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
