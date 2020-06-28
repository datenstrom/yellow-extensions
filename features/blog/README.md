Blog 0.8.6
==========
Blog for your website.

<p align="center"><img src="blog-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/blog.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `blog.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to use a blog

The blog is available on your website as `http://website/blog/`. To show the blog on the home page, go to your `content` folder and delete the `1-home` folder. To create a new blog page, add a new file to the blog folder. Set `Published` and other [settings](https://github.com/datenstrom/yellow-extensions/tree/master/features/core#settings) at the top of a page. The publishing date will be used to sort blog pages. Use `Tag` to group similar pages together. You can use `[--more--]` to add a page break at the desired spot.

## How to show blog information

You can use shortcuts to show information about the blog:

`[blogauthors]` for a list of authors  
`[blogtags]` for a list of tags  
`[blogarchive]` for a list of months  
`[blogrelated]` for a list of pages, related to the current page  
`[blogpages]` for a list of pages, alphabetic order  
`[blogchanges]` for a list of pages, published order  

The following arguments are available, all but the first argument are optional:

`Location` = blog location  
`PagesMax` = number of pages to show per shortcut, 0 for unlimited  
`Author` = show pages by a specific author, `[blogpages]` or `[blogchanges]` only  
`Tag` = show pages with a specific tag, `[blogpages]` or `[blogchanges]` only  

## Settings

The following settings can be configured in file `system/settings/system.ini`:

`BlogLocation` = blog location, empty means current folder  
`BlogNewLocation` = blog location for new page  
`BlogPagesMax` = number of pages to show per shortcut  
`BlogPaginationLimit` = number of entries to show per page  

The following files can be configured:

`content/shared/page-new-blog.md` = content file for new blog page  
`system/layouts/blogpages.html` = layout file for main blog page  
`system/layouts/blog.html` = layout file for individual blog page  

## Examples

Content file with blog page:

    ---
    Title: Blog example
    Published: 2013-04-07
    Author: Datenstrom
    Layout: blog
    Tag: Example
    ---
    This is an example blog page.

    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

Content file with blog page and page break:

    ---
    Title: Fika is good for you
    Published: 2016-06-01
    Author: Datenstrom
    Layout: blog
    Tag: Example, Coffee
    ---
    Fika is a Swedish custom. It's a social coffee break where people 
    gather to have a cup of coffee or tea together. [--more--]
    
    You can have fika with colleagues at work. You can invite your friends 
    to fika. Fika is such an important part of life in Sweden that it is 
    both a verb and a noun. How often do you fika?

Showing links to blog:

    [See all pages](/blog/)
    [See all pages by Datenstrom](/blog/author:datenstrom/)
    [See example](/blog/tag:example/)

Showing latest blog pages:

    [blogchanges /blog/]
    [blogchanges /blog/ 3]
    [blogchanges /blog/ 10]

Showing list of tags:

    [blogtags /blog/]
    [blogtags /blog/ 3]
    [blogtags /blog/ 10]

Showing list of pages:

    [blogpages /blog/]
    [blogpages /blog/ 10 Datenstrom]
    [blogpages /blog/ 10 - example]

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
