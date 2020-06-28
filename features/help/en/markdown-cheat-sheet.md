---
Title: Markdown cheat sheet
---
Markdown is a practical way to edit web pages.

## Basics

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

Adding an image:

    [image picture.jpg]
    [image picture.jpg Picture]
    [image picture.jpg "This is an example image"]

Adding an image, alternative format:

    ![image](picture.jpg)
    ![image](picture.jpg "Picture")
    ![image](picture.jpg "This is an example image")

## Extras

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

## Shortcuts

`[image picture.jpg Picture - 50%]` = [add image thumbnail](https://github.com/datenstrom/yellow-extensions/tree/master/features/image)  
`[gallery photo.*jpg - 20%]` = [add image gallery](https://github.com/datenstrom/yellow-extensions/tree/master/features/gallery)  
`[slider photo.*jpg]` = [add image gallery with slider](https://github.com/datenstrom/yellow-extensions/tree/master/features/slider)  
`[youtube fhs55HEl-Gc]` = [embed Youtube video](https://github.com/datenstrom/yellow-extensions/tree/master/features/youtube)  
`[soundcloud 101175715]` = [embed Soundcloud audio](https://github.com/datenstrom/yellow-extensions/tree/master/features/soundcloud)  
`[twitter datenstromse]` = [embed Twitter messages](https://github.com/datenstrom/yellow-extensions/tree/master/features/twitter)  
`[instagram BISN9ngjV2-]` = [embed Instagram photo](https://github.com/datenstrom/yellow-extensions/tree/master/features/instagram)  
`[googlecalendar en.swedish#holiday]` = [embed Google calendar](https://github.com/datenstrom/yellow-extensions/tree/master/features/googlecalendar)  
`[googlemap Stockholm]` = [embed Google map](https://github.com/datenstrom/yellow-extensions/tree/master/features/googlemap)  
`[blogchanges /blog/]` = [show latest blog pages](https://github.com/datenstrom/yellow-extensions/tree/master/features/blog)  
`[wikichanges /wiki/]` = [show latest wiki pages](https://github.com/datenstrom/yellow-extensions/tree/master/features/wiki)  
`[fa fa-envelope-o]` = [show icons and symbols](https://github.com/datenstrom/yellow-extensions/tree/master/features/fontawesome)  
`[ea ea-smile]` = [show emoji and colorful images](https://github.com/datenstrom/yellow-extensions/tree/master/features/emojiawesome)  
`[yellow]` = [show website version](https://github.com/datenstrom/yellow-extensions/tree/master/features/core)  
`[edit]` = [edit website in web browser](https://github.com/datenstrom/yellow-extensions/tree/master/features/edit)  
`[toc]` = [show table of contents](https://github.com/datenstrom/yellow-extensions/tree/master/features/toc)  
`[--more--]` = [add page break](https://github.com/datenstrom/yellow-extensions/tree/master/features/blog) 

## Settings

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
`Status` = status for workflow  
`Image` = page image  
`ImageAlt` = alternative text for page image  
`Modified` = page modification date, YYYY-MM-DD format  
`Published` = page publication date, YYYY-MM-DD format  
`Tag` = page tag(s) for categorisation, comma separated  
`Redirect` = redirect to a new page or URL  
