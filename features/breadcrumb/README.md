Breadcrumb 0.8.4
================
Breadcrumb navigation.

<p align="center"><img src="breadcrumb-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/breadcrumb.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `breadcrumb.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to add a navigation

Create a `[breadcrumb]` shortcut. 

The following arguments are available, all arguments are optional:
 
`Separator` = text shown between elements  
`Style` = breadcrumb style, e.g. `breadcrumb`  

## Settings

The following settings can be configured in file `system/settings/system.ini`:

`BreadcrumbSeparator` = text shown between elements  
`BreadcrumbStyle` = breadcrumb style, e.g. `breadcrumb`  

## Examples

Adding navigation:

    [breadcrumb]
    [breadcrumb > breadcrumb]
    [breadcrumb / breadcrumb]

Content file with breadcrumb:

    ---
    Title: Example page
    ---
    [breadcrumb]
        
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

Layout file with breadcrumb:

    <?php $this->yellow->layout("header") ?>
    <div class="content">
    <div class="main" role="main">
    <h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
    <?php echo $this->yellow->page->getExtra("breadcrumb") ?>
    <?php echo $this->yellow->page->getContent() ?>
    </div>
    </div>
    <?php $this->yellow->layout("footer") ?>

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>