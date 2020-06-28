Fontawesome 0.8.4
=================
Icons and symbols.

![Screenshot](fontawesome-screenshot.jpg?raw=true)

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/fontawesome.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `fontawesome.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to add an icon

Add `:shortcode:` to the text of a page. Here's a [complete list of icons](https://fontawesome.com/icons).

It's also possible to create a `[fa]` shortcut or use HTML `<i class="fa fa-name"></i>`. You can add an additional style to the name, for example `fa-lg`, `fa-2x`, `fa-3x`, `fa-4x` and `fa-5x`.

This extension uses [Font Awesome v4.5.0](https://github.com/FortAwesome/Font-Awesome) by Dave Gandy, which supports about 600 pictographic icons. It's licensed under [OFL 1.1](https://opensource.org/licenses/OFL-1.1). Font Awesome has symbols for web applications, buttons and forms.

## Settings

The following settings can be configured in file `system/settings/system.ini`:

`FontawesomeToolbarButtons` = toolbar buttons for the [edit extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/edit)  

## Examples

Adding an icon:

    :fa-envelope-o:
    :fa-twitter:
    :fa-github:

Adding an icon, normal size:

    [fa fa-envelope-o]
    [fa fa-twitter]
    [fa fa-github]
    
Adding an icon, double size:

    [fa fa-envelope-o fa-2x]
    [fa fa-twitter fa-2x]
    [fa fa-github fa-2x]

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
