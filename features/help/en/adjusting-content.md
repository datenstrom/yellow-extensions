---
Title: Adjusting content 
---
All content is located in the `content` folder. You can edit your website here.

    ├── content
    │   ├── 1-home
    │   └── shared
    ├── media
    └── system

The `content` folders are available on your website. Every folder has a file called `page.md` or with the name of the folder. You can also add more files and folders. Basically, what you see in the file manager is the website you get.

## Files and folders

The navigation is automatically created from your `content` folders:

1. Folders can have a numerical prefix, e.g. `1-home` or `9-about`
2. Files can have a numerical prefix, e.g. `2013-04-07-blog-example.md`
3. Files and folders without a prefix have no special meaning

Prefix and suffix are removed from the location, so that it looks better. For example the folder `content/9-about/` is available on your website as `http://website/about/`. The file `content/9-about/privacy.md` becomes `http://website/about/privacy`. 

There are two exception. The `home` folder must not contain subfolders, because it's responsible for the home page and available on your website as `http://website/`. The `shared` folder may only be included in other pages, it's not available on your website.

## Markdown

You can use [Markdown](markdown-cheat-sheet) to edit web pages. Open the file `content/1-home/page.md` in your favorite text editor. You'll see settings and text of the page. You can change `Title` and other [settings](markdown-cheat-sheet#settings) at the top of a page. Here's an example:

    ---
    Title: Home
    ---
    Your website works!
    
    [edit - You can edit this page] or use your text editor.

    You can install more features and themes.
    [Learn more](https://datenstrom.se/yellow/help/).

Formatting text:

    Normal **bold** *italic* ~~strikethrough~~ `code`

Making a list:

    * item one
    * item two
    * item three
