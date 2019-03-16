Core 0.8.3
==========
Core functionality for your website.

<p align="center"><img src="core-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/core.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `core.zip` into your `system/extensions` folder.

Do not delete the [extension files](extension.ini), they are always required.

## How to show website version

You can use the [web browser](https://github.com/datenstrom/yellow-extensions/tree/master/features/edit) or the [command line](https://github.com/datenstrom/yellow-extensions/tree/master/features/command) to show website version. You can open the [log file](https://developers.datenstrom.se/help/api#troubleshooting) to show system diagnostics. You can also use shortcuts to show the current website version. See example below.

## How to configure system settings

The following settings can be configured in file `system/settings/system.ini`:

`Sitename` = name of the website  
`Author` = webmaster's name  
`Email` = webmaster's email  
`Language` = default language  
`Timezone` = default timezone  
`Layout` = default layout  
`Theme` = default theme  
`SafeMode` = enable [safe mode](https://developers.datenstrom.se/help/security-configuration#safe-mode) with restrictions, 1 or 0  
`MultiLanguageMode` = enable [multi language mode](https://developers.datenstrom.se/help/language-configuration#multi-language-mode), 1 or 0  

These are the most important settings. For a complete list see [configuration file](https://github.com/datenstrom/yellow/blob/master/system/settings/system.ini).

## Example

Content file with website version:

```
---
Title: Example page
---
This website is made with [yellow].
```

Content file with website version, including extensions:

```
---
Title: Example page
---
This website is made with [yellow].

[yellow about]
```

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
