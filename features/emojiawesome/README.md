Emojiawesome 0.8.2
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

It's also possible to create an `[ea]` shortcut or use HTML `<i class="ea ea-name"></i>`.  
You can add an additional style to the name, for example `ea-lg`, `ea-2x`, `ea-3x`, `ea-4x` and `ea-5x`.

The extension uses [Twemoji v2.0.0](https://github.com/twitter/twemoji) by Twitter, which supports about 1600 colorful images. Images are licensed under [CC-BY](http://creativecommons.org/licenses/by/4.0/). Twemoji has images for people, animals, food and flags. Files are served from [cdnjs](https://cdnjs.com), you can configure a different CDN or your own server.

## Example

Adding an emoji:

    :smile: 
    :heart: 
    :coffee:

Adding an emoji with shortcut, normal and double size:

    [ea ea-smile]
    [ea ea-heart]
    [ea ea-coffee]
    
    [ea ea-smile ea-2x]
    [ea ea-heart ea-2x]
    [ea ea-coffee ea-2x]

Footer file with heart emoji:

    ---
    Title: Footer
    Status: hidden
    ---
    [Made with [ea ea-heart] and Datenstrom Yellow](https://datenstrom.se/yellow/)

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
