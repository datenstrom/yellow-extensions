Googlecalendar plugin 0.7.2
===========================
Embed Google calendar.

<p align="center"><img src="googlecalendar-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/googlecalendar.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `googlecalendar.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to embed a calendar?

Create a `[googlecalendar]` shortcut.

The following arguments are available:

`ID` = [public Google calendar](https://calendar.google.com/), wrap multiple calendars into quotes  
`MODE` = calendar mode, e.g. `week`, `month`, `events`, `agenda`  
`DATE` = start date or number of events, YYYY-MM-DD format  
`STYLE` = calendar style, e.g. `left`, `center`, `right`  
`WIDTH` = calendar width, pixel or percent  
`HEIGHT` = calendar height, pixel or percent  

## How to configure a calendar?

The following settings can be configured in file `system/config/config.ini`:

`GooglecalendarMode` = calendar mode  
`GooglecalendarEntriesMax` = number of events  
`GooglecalendarApiKey` = your Google API key  

The visual design of events and agenda can be adjusted in your theme.

## Example

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
    [googlecalendar de.german#holiday events 5]
    [googlecalendar de.german#holiday agenda 5]

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
