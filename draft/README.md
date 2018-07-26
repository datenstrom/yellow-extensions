Draft plugin 0.7.1
==================
Support for draft pages.

<p align="center"><img src="draft-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/draft.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `draft.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to make a draft page

Set `Status: draft` in the settings at the top of a page. The page will no longer be public visible. You can continue to edit a draft page in the web browser and the file system.

## Example

Content file with draft status:

    ---
    Title: Example page
    Status: draft
    ---
    This is an example page.

Content file with draft status for blog:

    ---
    Title: Blog example
    Published: 2013-04-07
    Author: Datenstrom
    Template: blog
    Tag: Example
    Status: draft
    ---
    This is an example blog page.
 
Content file with draft status for wiki:

    ---
    Title: Wiki page
    Template: wiki
    Tag: Example
    Status: draft
    ---
    This is an example wiki page.

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
