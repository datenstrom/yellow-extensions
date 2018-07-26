Emojiawesome plugin 0.7.2
=========================
Lots and lots of emoji.

![Screenshot](emojiawesome-screenshot.jpg?raw=true)

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/emojiawesome.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `emojiawesome.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to add an emoji

Add `:shortcode:` to the text of a page. Here's an [emoji cheat sheet](http://www.emoji-cheat-sheet.com). 

It's also possible to create an `[ea NAME]` shortcut or use HTML `<i class="ea NAME"></i>`.  
You can add an additional style to the name, for example `ea-lg`, `ea-2x`, `ea-3x`, `ea-4x` and `ea-5x`.

The plugin uses [Twemoji v2.0.0](https://github.com/twitter/twemoji) by Twitter, which supports about 1600 colorful images. Images are licensed under [CC-BY](http://creativecommons.org/licenses/by/4.0/). Emoji Awesome has images for people, animals, food and flags. There's an `emojiawesome.css` which you can adjust or use in your own style sheets. Files are served from [cdnjs](https://cdnjs.com), you can configure a different CDN or your own server.

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

Footer snippet with heart emoji:

    <div class="footer">
    <div class="siteinfo">
    <a href="<?php echo $yellow->page->base."/" ?>">&copy; 2018 <?php echo $yellow->page->getHtml("sitename") ?></a>.
    <a href="<?php echo $yellow->text->get("yellowUrl") ?>">Made with <i class="ea ea-heart"></i> and Datenstrom Yellow</a>.
    </div>
    </div>
    </div>
    <?php echo $yellow->page->getExtra("footer") ?>
    </body>
    </html>

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
