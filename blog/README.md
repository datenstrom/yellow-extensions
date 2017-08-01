Blog plugin 0.7.2
=================
Blog for your website. [See demo](https://developers.datenstrom.se/plugins/blog/).

<p align="center"><img src="blog-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/blog.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `blog.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

## How to use a blog?

The blog is available on your website as `http://website/blog/`. To show the blog on the home page, go to your `content` folder and delete the `1-home` folder. To create a new blog page, add a new file to the blog folder. Set `Published` and other [settings](https://developers.datenstrom.se/help/markdown-cheat-sheet#settings) at the top of a page. Use `Tag` to group similar pages together. [Learn more](https://developers.datenstrom.se/help/how-to-make-a-blog).

## How to configure a blog?

You can use shortcuts to show information about the blog:

`[blogarchive LOCATION PAGESMAX]` for a list of months  
`[blogauthors LOCATION PAGESMAX]` for a list of authors  
`[blogrecent LOCATION PAGESMAX]` for recently published pages  
`[blogrelated LOCATION PAGESMAX]` for related pages to current page  
`[blogtags LOCATION PAGESMAX]` for a list of tags  
`[--more--]` for a page break  

The following arguments are available:

`LOCATION` = blog location  
`PAGESMAX` = number of pages, 0 for unlimited  

The following settings can be configured in file `system/config/config.ini`:

`BlogLocation` = blog location  
`BlogNewLocation` = blog location for new page  
`BlogPagesMax` = number of pages  
`BlogPaginationLimit` = number of entries to show per page  

## Example

Showing recently published pages:

    [blogrecent /blog/]
    [blogrecent /blog/ 5]
    [blogrecent /blog/ 20]

Showing list of tags:

    [blogtags /blog/]
    [blogtags /blog/ 5]
    [blogtags /blog/ 20]

Showing archive of months:

    [blogarchive /blog/ 0]
    [blogarchive /blog/ 12]
    [blogarchive /blog/ 24]

## Developer

Datenstrom
