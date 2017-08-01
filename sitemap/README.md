Sitemap plugin 0.7.1
====================
Sitemap for your website. [See demo](https://developers.datenstrom.se/sitemap/).

<p align="center"><img src="sitemap-screenshot.png?raw=true" alt="Screenshot"></p>

## How do I install this?

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/sitemap.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `sitemap.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

## How to use a sitemap?

The sitemap is available as `http://website/sitemap/` and `http://website/sitemap/page:sitemap.xml`. It's an overview of the entire website, only visible pages are included. You can add a link to the sitemap somewhere on your website. See example below.

## How to configure a sitemap?

The following settings can be configured in file `system/config/config.ini`:

`SitemapLocation` = sitemap location  
`SitemapFileXml` = sitemap file name with XML information  
`SitemapPaginationLimit` = number of entries to show per page  

## Example

Footer snippet with sitemap:

    <div class="footer">
    <div class="siteinfo">
    <a href="<?php echo $yellow->page->base."/" ?>">&copy; 2017 <?php echo $yellow->page->getHtml("sitename") ?></a>.
    <a href="<?php echo $yellow->page->base."/sitemap/" ?>">Sitemap</a>. 
    <a href="<?php echo $yellow->page->get("pageEdit") ?>">Edit</a>.
    <a href="<?php echo $yellow->text->get("yellowUrl") ?>">Made with Yellow</a>.
    </div>
    </div>
    </div>
    <?php echo $yellow->page->getExtra("footer") ?>
    </body>
    </html>

## Developer

Datenstrom
