Twitter 0.8.4
=============
Embed Twitter messages.

<p align="center"><img src="twitter-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/twitter.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `twitter.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to embed a message

Create a `[twitter]` shortcut. 

The following arguments are available, all but the first argument are optional:
 
`Id` = last part of a [Twitter](https://www.twitter.com) link, e.g. `https://twitter.com/dog_feelings/status/1169078881963261953`  
`Theme` = message theme, e.g. `light`, `dark`  
`Style` = message style, e.g. `left`, `center`, `right`  
`Width` = message width, pixel or percent  
`Height` = message height, pixel or percent  

## Settings

The following settings can be configured in file `system/settings/system.ini`:

`TwitterTheme` = message theme, e.g. `light`, `dark`  

## Examples

Embedding a tweet:

    [twitter 1169078881963261953]
    [twitter 1169078881963261953 dark]
    [twitter 1169078881963261953 light right]

Embedding a timeline:

    [twitter dog_feelings]
    [twitter dog_feelings/likes]
    [twitter dog_feelings/likes light - 250 250]

Embedding a follow button:

    [twitterfollow dog_feelings]

## Developer

Datenstrom, Steffen Schultz. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
