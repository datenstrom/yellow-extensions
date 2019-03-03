Breadcrumbs 0.8.2
=================
Breadcrumbs navigation.

<p align="center"><img src="breadcrumbs-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/breadcrumbs.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `breadcrumbs.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to add breadcrumbs

Create a `[breadcrumbs]` shortcut. 

The following arguments are available, all arguments are optional:
 
`Separator` = text shown between breadcrumbs  
`Style` = breadcrumbs style, e.g. `breadcrumbs`  
 
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

Layout file with breadcrumbs:

    <?php $this->yellow->layout("header") ?>
    <div class="content">
    <?php $this->yellow->layout("sidebar") ?>
    <div class="main" role="main">
    <h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
    <?php echo $this->yellow->page->getExtra("breadcrumbs") ?>
    <?php echo $this->yellow->page->getContent() ?>
    </div>
    </div>
    <?php $this->yellow->layout("footer") ?>

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
