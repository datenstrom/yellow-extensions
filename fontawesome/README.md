Fontawesome plugin 0.7.2
========================
Icons and symbols.

![Screenshot](fontawesome-screenshot.jpg?raw=true)

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/fontawesome.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `fontawesome.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to add an icon

Add `:shortcode:` to the text of a page. Here's a [complete list of icons](https://fontawesome.com/icons).

It's also possible to create a `[fa NAME]` shortcut or use HTML `<i class="fa NAME"></i>`. 

You can add an additional style to the name, for example `fa-lg`, `fa-2x`, `fa-3x`, `fa-4x` and `fa-5x`.

The plugin uses [Font Awesome v4.5.0](https://github.com/FortAwesome/Font-Awesome) by Dave Gandy, which supports about 600 pictographic icons. It's licensed under [OFL 1.1](https://opensource.org/licenses/OFL-1.1). Font Awesome has icons for web applications, buttons and forms. There's a `fontawesome.css` which you can adjust or use in your own style sheets.

## Example

Adding an icon:

    :fa-envelope-o:
    :fa-twitter:
    :fa-github:

Adding an icon, normal and double size:

    [fa fa-envelope-o]
    [fa fa-twitter]
    [fa fa-github]
    
    [fa fa-envelope-o fa-2x]
    [fa fa-twitter fa-2x]
    [fa fa-github fa-2x]

Navigation snippet with social media icons:

    <?php $pages = $yellow->pages->top() ?>
    <?php $yellow->page->setLastModified($pages->getModified()) ?>
    <div class="navigation">
    <ul>
    <?php foreach($pages as $page): ?>
    <li><a<?php echo $page->isActive() ? " class=\"active\"" : "" ?> href="<?php echo $page->getLocation(true) ?>"><?php echo $page->getHtml("titleNavigation") ?></a></li>
    <?php endforeach ?>
    <li><a href="https://twitter.com/datenstromse"><i class="fa fa-twitter fa-lg"></i></a></li>
    <li><a href="https://github.com/datenstrom"><i class="fa fa-github fa-lg"></i></a></li>
    <li><a href="https://datenstrom.se"><i class="fa fa-heart fa-lg"></i></a></li>
    </ul>
    </div>
    <div class="navigation-banner"></div>

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
