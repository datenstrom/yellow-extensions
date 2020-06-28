Markdown 0.8.14
===============
Text formatting for humans.

<p align="center"><img src="markdown-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/markdown.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `markdown.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to format text

Markdown is a practical way to edit web pages.

This extension uses [Markdown Extra v1.9.0](https://github.com/michelf/php-markdown) by Michel Fortin, which is a text-to-HTML conversion tool. It's licensed under [BSD license](https://opensource.org/licenses/BSD-3-Clause). Here's the [Markdown syntax](http://commonmark.org/help/), a list of [Markdown Extra features](https://michelf.ca/projects/php-markdown/extra/) and [GitHub Flavored Markdown](https://help.github.com/en/articles/basic-writing-and-formatting-syntax). 

There's also an experimental Markdown parser based on [Parsedown Extra v1.8.0-beta-7](https://github.com/erusev/parsedown) by Emanuil Rusev. It's licensed under [MIT license](https://opensource.org/licenses/MIT). You can [download extension](https://github.com/datenstrom/yellow-extensions/raw/master/features/markdown/markdownx.php) and copy it into your `system/extensions` folder. Now you can switch Markdown parsers with `Parser: markdown` = Markdown Extra, `Parser: markdownx` = Parsedown Extra.

## How to use shortcuts

In addition to Markdown there are shortcuts. Markdown provides the basic features, shortcuts provide common features. You can add [images](https://github.com/datenstrom/yellow-extensions/tree/master/features/image), [emoji](https://github.com/datenstrom/yellow-extensions/tree/master/features/emojiawesome), [icons](https://github.com/datenstrom/yellow-extensions/tree/master/features/fontawesome), [maps](https://github.com/datenstrom/yellow-extensions/tree/master/features/googlemap), [table of contents](https://github.com/datenstrom/yellow-extensions/tree/master/features/toc) and more to your website.

## Examples

Formatting text:

    Normal **bold** *italic* ~~strikethrough~~ `code`

Making a list:

    * item one
    * item two
    * item three

Making an ordered list:

    1. item one
    2. item two
    3. item three

Making a task list:

    - [x] item one
    - [ ] item two
    - [ ] item three

Making a heading:

    # Heading 1
    ## Heading 2
    ### Heading 3

Making quotes:

    > Quote
    >> Quote of a quote
    >>> Quote of a quote of a quote

Making links:

    [Link to page](/help/how-to-make-a-website)
    [Link to file](/media/downloads/yellow.pdf)
    [Link to website](https://datenstrom.se)

Adding images:

    [image picture.jpg]
    [image picture.jpg Picture]
    [image picture.jpg "This is an example image"]

Making tables:

    | Coffee     | Milk | Strength |
    |------------|------|----------|
    | Espresso   | no   | strong   |
    | Macchiato  | yes  | medium   |
    | Cappuccino | yes  | weak     |

Making footnotes:

    Text with a footnote[^1] and some more footnotes.[^2] [^3]
    
    [^1]: Here's the first footnote
    [^2]: Here's the second footnote
    [^3]: Here's the third footnote

Showing source code:

    ```
    Source code will be shown unchanged.
    function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    ```

Making paragraphs:

    Here's the first paragraph. Text can span over several lines
    and can be separated by a blank line from the next paragraph.

    Here's the second paragraph.

Making line breaks:

    Here's the first line⋅⋅
    Here's the second line⋅⋅
    Here's the third line⋅⋅
    
    Spaces at the end of the line are shown with dots (⋅)

Making notices:

    ! Here's a notice with warning
    
    !! Here's a notice with error
    
    !!! Here's a notice with tip

Using CSS:

    ! {.class}
    ! Here's a notice with custom class.
    ! Text can span over several lines
    ! and contain Markdown formatting.

Using HTML:

    <strong>Text with HTML</strong> can be used optionally.
    <a href="https://datenstrom.se" target="_blank">Open link in new tab</a>.

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
