Core plugin 0.7.8
=================
Core functionality for your website.

<p align="center"><img src="core-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/core.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `core.zip` into your `system/plugins` folder.

Do not delete the [plugin files](update.ini), they are always required.

## How to use the core

The plugin provides the core functionality for your website. It takes care of requests from the web browser and access to the file system. You can use the [web browser](https://github.com/datenstrom/yellow-plugins/tree/master/edit) or the [command line](https://github.com/datenstrom/yellow-plugins/tree/master/command) to show software version and updates. To show more information about your website add a `[yellow]` shortcut to a page. See example below.

## How to configure the core

The following settings can be configured in file `system/config/config.ini`:

`Sitename` = name of the website  
`Author` = webmaster's name  
`Email` = webmaster's email  
`Language` = default language  
`Timezone` = default timezone  
`Theme` = default theme  
`MultiLanguageMode` = enable [multi language mode](https://developers.datenstrom.se/help/language-configuration#multi-language-mode), 1 or 0  
`SafeMode` = enable [safe mode](https://developers.datenstrom.se/help/security-configuration#safe-mode) with restrictions, 1 or 0  

These are the most important settings. For a complete list see [configuration file](https://github.com/datenstrom/yellow/blob/master/system/config/config.ini).

## Example

Content file with software version:

```
---
Title: Example page
---
This website is made with [yellow].
```

Content file with software version, including plugins and themes:

```
---
Title: Example page
---
This website is made with [yellow].

[yellow version]
```

Content file with error message:

```
---
Title: Server error
---
Something went wrong. [yellow error]
```

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
