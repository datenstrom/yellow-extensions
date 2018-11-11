Highlight plugin 0.7.6
======================
Highlight source code.

<p align="center"><img src="highlight-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/highlight.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `highlight.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to highlight source code

Wrap your code blocks in \`\`\` and add a language identifier. The appearance of highlighted source code can be adjusted in your theme.

The plugin uses [highlight.php 9.12.0](https://github.com/scrivo/highlight.php) by Ivan Sagalaev and Geert Bergman, which supports about 170 programming languages. It's licensed under [BSD license](https://opensource.org/licenses/BSD-3-Clause). The following languages are included: C, CPP, CSS, HTML, JavaScript, JSON, PHP, Python, YAML. You can download more [language files](https://github.com/scrivo/highlight.php/tree/master/Highlight/languages), rename and copy them into your `system/plugins` folder.

## Example

Highlighting of JavaScript code:

    ``` javascript
    var ready = function() 
    {
        console.log("Hello world");
        // Add more JavaScript code here
    }
    window.addEventListener('load', ready, false);
    ```

Highlighting of HTML code, without and with line number:
    
    ``` html
    <body>
    <p>Hello world!</p>
    </body>
    ```

    ``` html {.with-line-number}
    <body>
    <p>Hello world!</p>
    </body>
    ```

## Developer

Datenstrom featuring Ivan Sagalaev and Geert Bergman. [Get support](https://developers.datenstrom.se/help/support).
