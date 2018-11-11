Search plugin 0.7.7
===================
Full-text search. [See demo](https://developers.datenstrom.se/plugins/search).

<p align="center"><img src="search-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/search.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `search.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to use a search

The search is available on your website as `http://website/search/`. It searches trough content of the entire website, only visible pages are included. You can use a [custom navigation](https://developers.datenstrom.se/help/customising-templates#custom-navigation), open file `system/config/config.ini` and change `Navigation: navigation-search`. To show a search field add a `[search]` shortcut with optional location. You can also add a link to the search somewhere on your website. See example below.

## How to configure a search

The following settings can be configured in file `system/config/config.ini`:

`SearchLocation` = search location  
`SearchPaginationLimit` = number of entries to show per page  
`SearchPageLength` = maximum page length to show  

## Example

Adding a search field:

    [search]
    [search /en/search/]
    [search /de/search/]

Content file with search field:

    ---
    Title: Example page
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [search]

Footer snippet with search page:

    <div class="footer" role="contentinfo">
    <div class="siteinfo">
    <a href="<?php echo $yellow->page->base."/" ?>">&copy; 2018 <?php echo $yellow->page->getHtml("sitename") ?></a>.
    <a href="<?php echo $yellow->page->base."/search/" ?>">Search</a>.
    <a href="<?php echo $yellow->text->get("yellowUrl") ?>">Made with Datenstrom Yellow</a>.
    </div>
    </div>
    </div>
    <?php echo $yellow->page->getExtra("footer") ?>
    </body>
    </html>

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
