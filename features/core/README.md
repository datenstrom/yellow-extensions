Core 0.8.13
===========
Core functionality of the website.

<p align="center"><img src="core-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/core.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `core.zip` into your `system/extensions` folder.

Please do not delete the [extension files](extension.ini), they are always required.

## How to customise a website

If you want to adjust the content, then use [Markdown](https://github.com/datenstrom/yellow-extensions/tree/master/features/markdown). All content is located in your `content` folder. Create the file `content/shared/header.md` for a header. Create the file `content/shared/footer.md` for a footer. You can also create a header and footer in any other folder, then it will only be shown on pages in the same folder. Some themes have support for header, footer and sidebar.

If you want to adjust HTML, then change the layout. The default layout is defined in file `system/settings/system.ini`. A different layout can be defined in the [settings](#settings) at the top of each page, for example `Layout: default`. All layout files are stored in your `system/layouts` folder. There's an [API for developers](https://github.com/datenstrom/yellow-extensions/tree/master/features/help), for example to create your own navigation.

If you want to adjust CSS, then change the theme. The default theme is defined in file `system/settings/system.ini`. A different theme can be defined in the [settings](#settings) at the top of each page, for example `Theme: stockholm`. Strictly speaking, themes consist not only of CSS but of multiple files. All resource files are stored in your `system/resources` folder. There are [themes](https://github.com/datenstrom/yellow-extensions/tree/master/themes) to download.

## How to make a multilingual website

Your website comes with three languages and you can install more [languages](https://github.com/datenstrom/yellow-extensions/tree/master/languages). The default language is defined in file `system/settings/system.ini`. A different language can be defined in the [settings](#settings) at the top of each page, for example `Language: en`.

If you want to translate the entire website into multiple languages, then enable the multi language mode. Open file `system/settings/system.ini` and change `CoreMultiLanguageMode: 1`. Then you have to adjust the [folder structure](#folders). Go to your `content` folder and create a new folder for each language.

If you want to configure text, then change the text settings. Open file `system/settings/text.ini` and change existing settings. You can copy the [default settings from language files](https://github.com/datenstrom/yellow-extensions/blob/master/languages/english/english-language.txt) and paste them into this file. You can also add your own text settings, for example image captions.

## How to make a secure website

[Keep your website up to date](https://github.com/datenstrom/yellow-extensions/tree/master/features/update). It's recommended to update the website as soon as a new release is available. Also check if your website supports data encryption. It's best if the Internet connection is always encrypted with HTTPS. When there are problems, please contact your web hosting provider.

If you don't want that pages are modified, then restrict [user accounts](https://github.com/datenstrom/yellow-extensions/tree/master/features/edit). You can configure what users are allowed to do, which pages can be changed and which files can be uploaded. The file formats GIF, JPG, PDF, PNG, SVG and ZIP are supported per default.

If you don't want to get that many spam messages, then restrict the [contact page](https://github.com/datenstrom/yellow-extensions/tree/master/features/contact). You can determine who can receive messages and whether they can contain clickable links. It's recommended to restrict links, this blocks many unwanted messages.

## How to hide a page

Set `Status: unlisted` in the [settings](#settings) at the top of a page. The page is no longer visible in navigation and search results. You can choose between different [status values](#settings-status), to control who can see and access a page.

## How to redirect a page

Set `Redirect` in the [settings](#settings) at the top of a page. The page is redirected to another page or URL. You can continue to edit the page in the [web browser](https://github.com/datenstrom/yellow-extensions/tree/master/features/edit) and the file system.

## Folders

The following folders are available:

```
├── content               = content files
│   ├── 1-home            = home page
│   └── shared            = shared files
├── media                 = media files
│   ├── downloads         = files to download
│   ├── images            = image files for the content
│   └── thumbnails        = image thumbnails
└── system                = system files
    ├── extensions        = extension files
    ├── layouts           = layout files, HTML files
    ├── resources         = resource files, CSS files, fonts, etc.
    ├── settings          = configuration files, INI files
    └── trash             = deleted files
```

Folder structure for multilingual website:

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

Folder structure for multilingual website, with automatic language detection:

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

## Settings

The following settings can be configured at the top of a page:

`Title` = page title  
`TitleContent` = page title shown in content  
`TitleNavigation` = page title shown in navigation  
`TitleHeader` = page title shown in web browser  
`TitleSlug` = page title used for saving the page  
`Description` = page description  
`Author` = page author(s), comma separated  
`Email` = email of page author  
`Language` = page language  
`Layout` = page layout  
`LayoutNew` = page layout for creating a new page  
`Theme` = page theme  
`Parser` = page parser  
`Status` = page status, [supported status values](#settings-status)  
`Redirect` = redirect to another page or URL  
`Image` = page image  
`ImageAlt` = alternative text for page image  
`Modified` = page modification date, YYYY-MM-DD format  
`Published` = page publication date, YYYY-MM-DD format  
`Tag` = page tag(s) for categorisation, comma separated  
`Build` = page option(s) for building a [static website](https://github.com/datenstrom/yellow-extensions/tree/master/features/command), comma separated  

<a id="settings-system"></a>The following settings can be configured in file `system/settings/system.ini`:

`Sitename` = name of the website  
`Author` = name of the webmaster  
`Email` = email of the webmaster  
`Language` = default language  
`Layout` = default layout  
`Theme` = default theme  
`Parser` = default page parser  
`Status` = default page status, [supported status values](#settings-status)  
`CoreStaticUrl` = URL for [static website](https://github.com/datenstrom/yellow-extensions/tree/master/features/command)  
`CoreStaticDefaultFile` =  default file for static website  
`CoreStaticErrorFile` = error file for static website  
`CoreStaticDirectory` = directory for generated files  
`CoreCacheDirectory` = directory for cached files  
`CoreTrashDirectory` = directory for deleted files  
`CoreServerUrl` = URL of the website, `auto` for automatic detection    
`CoreServerTimezone` = timezone of the website  
`CoreMultiLanguageMode` = enable multi language mode, 1 or 0  

<a id="settings-text"></a>The following settings can be configured in file `system/settings/text.ini`:

`CoreDateFormatShort` = short date format  
`CoreDateFormatMedium` = medium date format, usually 2016-06-01  
`CoreDateFormatLong` = long date format  
`CoreTimeFormatShort` = short time format  
`CoreTimeFormatMedium` = medium time format, usually 13:37:01  
`CoreTimeFormatLong` = long time format  

<a id="settings-status"></a>The following page status values are supported:

`public` = page is a normal page  
`private` = page is not visible, user needs to enter password, requires [private extension](https://github.com/schulle4u/yellow-extensions-schulle4u/tree/master/private)  
`draft` = page is not visible, user needs to log in, requires [draft extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/draft)  
`unlisted` = page is not visible, but can be accessed with the correct link  
`shared` = page is not available, but can be included in other pages  

<a id="settings-files"></a>The following files can be configured:

`system/layouts/default.html` = layout file for default page  
`system/layouts/error.html` = layout file for default error page  
`system/layouts/header.html` = layout file for default HTML header  
`system/layouts/footer.html` = layout file for default HTML footer  
`system/layouts/navigation.html` = layout file for default navigation  
`system/layouts/pagination.html` = layout file for default pagination  

## Examples

Content file with normal page:

    ---
    Title: Normal page
    ---
    This is an example page.

Content file with unlisted page:

    ---
    Title: Unlisted page
    Status: unlisted
    ---
    This page is not visible in navigation and search results.

Content file with header:

    ---
    Title: Header
    Status: shared
    ---
    I like Markdown.

Content file with footer:

    ---
    Title: Footer
    Status: shared
    ---
    [Made with Datenstrom Yellow](https://datenstrom.se/yellow/)

Content file with redirection:

    ---
    Title: Redirect page
    Redirect: https://datenstrom.se/yellow/
    ---
    This page is redirected to another page.

Content file with options for building a static website:

    ---
    Title: Example page
    Build: exclude
    ---
    This page is not taken into account when building a static website.

Configuring text settings:

    Language: en
    CoreDateFormatMedium: Y-m-d
    picture.jpg: This is an example image

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
