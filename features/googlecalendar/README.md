Googlecalendar 0.8.6
====================
Embed Google calendar.

<p align="center"><img src="googlecalendar-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/googlecalendar.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `googlecalendar.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to embed a calendar

Create a `[googlecalendar]` shortcut.

The following arguments are available, all but the first argument are optional:

`Id` = public [Google calendar](https://calendar.google.com/), wrap multiple calendars into quotes  
`Mode` = calendar mode, e.g. `week`, `month`, `events`, `agenda`  
`Date` = start date or number of events, YYYY-MM-DD format  
`Style` = calendar style, e.g. `left`, `center`, `right`  
`Width` = calendar width, pixel or percent  
`Height` = calendar height, pixel or percent  

## Settings

The following settings can be configured in file `system/settings/system.ini`:

`GooglecalendarMode` = calendar mode, e.g. `week`, `month`, `events`, `agenda`  
`GooglecalendarEntriesMax` = number of entries  
`GooglecalendarStyle` = calendar style, e.g. `flexible`  
`GooglecalendarApiKey` = your Google API key  

## Examples

Embedding a calendar:

    [googlecalendar en.swedish#holiday]
    [googlecalendar en.swedish#holiday week]
    [googlecalendar en.swedish#holiday month - right 240 240]

Embedding a calendar, multiple calendars together:

    [googlecalendar "sv.swedish#holiday, de.german#holiday, fr.french#holiday"]
    [googlecalendar "sv.swedish#holiday, de.german#holiday, fr.french#holiday" week 2017-01-01]
    [googlecalendar "sv.swedish#holiday#0044AA, de.german#holiday#AA0000, fr.french#holiday#00AA00" month 2017-01-01]

Embedding a calendar, events and agenda:

    [googlecalendar de.german#holiday events]
    [googlecalendar de.german#holiday events 10]
    [googlecalendar de.german#holiday agenda 10]

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
