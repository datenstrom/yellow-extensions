Breadcrumbs plugin 0.6.2
========================
Breadcrumbs navigation.

<p align="center"><img src="breadcrumbs-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/breadcrumbs.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `breadcrumbs.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to add breadcrumbs

Create a `[breadcrumbs]` shortcut. 

The following arguments are available:
 
`SEPARATOR ` = text used between pages  
`STYLE` = breadcrumbs style, e.g. `breadcrumbs`  
 
## Example

Adding breadcrumbs:

    [breadcrumbs]
    [breadcrumbs > breadcrumbs]
    [breadcrumbs / breadcrumbs]


Content file with breadcrumbs:

    ---
    Title: Example page
    ---
    [breadcrumbs]
        
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

Content snippet with breadcrumbs:

    <div class="content">
    <?php $yellow->snippet("sidebar") ?>
    <div class="main">
    <h1><?php echo $yellow->page->getHtml("titleContent") ?></h1>
    <?php echo $yellow->page->getExtra("breadcrumbs") ?>
    <?php echo $yellow->page->getContent() ?>
    </div>
    </div>

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
