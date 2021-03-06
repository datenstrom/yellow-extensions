---
Title: How to adjust system
---
All settings are located in the `system` folder. You can adjust your website here.

    ├── content
    ├── media
    └── system
        ├── extensions
        ├── layouts
        ├── themes
        └── trash

The `extensions` folder contains installed extensions. You can use the `layouts` folder and the `themes` folder to adjust the appearance of your website. The `trash` folder contains deleted files.

## System settings

The main configuration file is `system/extensions/yellow-system.ini`. Here's an example:

    Sitename: Anna Svensson Design
    Author: Anna Svensson
    Email: anna@svensson.com
    Theme: stockholm
    Language: en
    Layout: default

You can define the system settings here, for example the name of the website. Individual [page settings](#page-settings) can be defined at the top of each page. For a new installation you should set `Sitename`, `Author` and `Email`.

## User settings

All user accounts are stored in file `system/extensions/yellow-user.ini`. Here's an example:

    Email: anna@svensson.com
    Name: Anna Svensson
    Description: Designer
    Language: en
    Home: /
    Access: create, edit, delete, restore, upload, configure, install, uninstall, update
    Hash: $2y$10$j26zDnt/xaWxC/eqGKb9p.d6e3pbVENDfRzauTawNCUHHl3CCOIzG
    Stamp: 21196d7e857d541849e4
    Pending: none
    Failed: 0
    Modified: 2000-01-01 13:37:00
    Status: active

You can use the [web browser](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit) and the [command line](https://github.com/datenstrom/yellow-extensions/tree/master/source/command) to create new user accounts and change passwords. A user account consists of `Email` and other settings. If you don't want that pages are modified in a web browser, then change `Home` and `Access`. Users are allowed to edit pages within their home page, but nowhere else.

## Language settings

Another configuration file is `system/extensions/yellow-language.ini`. Here's an example:

    Language: en
    CoreDateFormatShort: F Y
    CoreDateFormatMedium: Y-m-d
    CoreDateFormatLong: Y-m-d H:i
    EditMailFooter: @sitename
    ImageDefaultAlt: Image without description
    media/images/photo.jpg: This is an example image

You can define the language settings here, for example the date format. Language settings consist of `Language` and other settings. You can copy the [default settings from language files](https://github.com/datenstrom/yellow-extensions/blob/master/source/english/english.txt) and paste them into this file. You can also add your own language settings, for example image captions.

## Page settings

The following settings can be configured at the top of a page:

`Title` = page title  
`TitleContent` = page title shown in content  
`TitleNavigation` = page title shown in navigation  
`TitleHeader` = page title shown in web browser  
`TitleSlug` = page title used for saving the page  
`Description` = page description  
`Author` = page author(s), comma separated  
`Email` = email of page author  
`Theme` = page theme  
`Language` = page language  
`Layout` = page layout  
`LayoutNew` = page layout for creating a new page  
`Parser` = page parser  
`Status` = status for workflow  
`Redirect` = redirect to a new page or URL  
`Image` = page image  
`ImageAlt` = description of the page image  
`Modified` = page modification date, YYYY-MM-DD format  
`Published` = page publication date, YYYY-MM-DD format  
`Tag` = page tag(s) for categorisation, comma separated  
`Build` = page option(s) for building a static website, comma separated  
`Comment` = page option(s) for showing comments, comma separated  

Do you have questions? [Get help](.) and [contribute](contributing-guidelines).
