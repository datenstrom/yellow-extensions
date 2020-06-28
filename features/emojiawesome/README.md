Emojiawesome 0.8.5
==================
Lots and lots of emoji.

![Screenshot](emojiawesome-screenshot.jpg?raw=true)

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/emojiawesome.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `emojiawesome.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to add an emoji

Add `:shortcode:` to the text of a page. Here's an [emoji cheat sheet](http://www.emoji-cheat-sheet.com). 

It's also possible to create an `[ea]` shortcut or use HTML `<i class="ea ea-name"></i>`. You can add an additional style to the name, for example `ea-lg`, `ea-2x`, `ea-3x`, `ea-4x` and `ea-5x`.

This extension uses [Twemoji v2.0.0](https://github.com/twitter/twemoji) by Twitter, which supports about 1600 colorful images. Images are licensed under [CC-BY](http://creativecommons.org/licenses/by/4.0/). Twemoji has images for people, animals, food and flags. Files are served from [cdnjs](https://cdnjs.com), you can configure a different CDN or your own server.

## Settings

The following settings can be configured in file `system/settings/system.ini`:

`EmojiawesomeCdn` = URL of CDN with emoji images  
`EmojiawesomeToolbarButtons` = toolbar buttons for the [edit extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/edit)  

## Examples

Adding an emoji:

    :smile: 
    :heart: 
    :coffee:

Adding an emoji, normal size:

    [ea ea-smile]
    [ea ea-heart]
    [ea ea-coffee]

Adding an emoji, double size:
    
    [ea ea-smile ea-2x]
    [ea ea-heart ea-2x]
    [ea ea-coffee ea-2x]

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
