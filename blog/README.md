Blog plugin 0.7.8
=================
Blog for your website. [See demo](https://developers.datenstrom.se/plugins/blog/).

<p align="center"><img src="blog-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/blog.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `blog.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to use a blog

The blog is available on your website as `http://website/blog/`. To show the blog on the home page, go to your `content` folder and delete the `1-home` folder. To create a new blog page, add a new file to the blog folder. Set `Published` and other [settings](https://developers.datenstrom.se/help/markdown-cheat-sheet#settings) at the top of a page. Use `Tag` to group similar pages together. You can use `[--more--]` to add a page break at the desired spot. [Learn more](https://developers.datenstrom.se/help/how-to-make-a-blog).

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
`PagesMax` = number of pages, 0 for unlimited  
`Author` = show pages by a specific author, `[blogpages]` or `[blogchanges]` only  
`Tag` = show pages with a specific tag, `[blogpages]` or `[blogchanges]` only  

## How to configure a blog

The following settings can be configured in file `system/config/config.ini`:

`BlogLocation` = blog location  
`BlogNewLocation` = blog location for new page  
`BlogPagesMax` = number of pages  
`BlogPaginationLimit` = number of entries to show per page  

The following files can be configured:

`system/config/page-new-blog.md` = content file for new blog page  
`system/themes/snippets/content-blog.php` = source code for blog page  
`system/themes/snippets/content-blogpages.php` = source code for main page  

## Example

Showing latest blog pages:

    [blogchanges /blog/]
    [blogchanges /blog/ 5]
    [blogchanges /blog/ 20]

Showing list of tags:

    [blogtags /blog/]
    [blogtags /blog/ 5]
    [blogtags /blog/ 20]

Showing list of pages:

    [blogpages /blog/]
    [blogpages /blog/ 5 ]
    [blogpages /blog/ 20 - example]

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
