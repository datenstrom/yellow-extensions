Draft 0.8.2
===========
Support for draft pages.

<p align="center"><img src="draft-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/draft.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `draft.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to make a draft page

Set `Status: draft` in the settings at the top of a page. The page will no longer be public visible. You can continue to edit a draft page in the [web browser](https://github.com/datenstrom/yellow-extensions/tree/master/features/edit) and the file system.

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
    Layout: blog
    Tag: Example
    Status: draft
    ---
    This is an example blog page.
 
Content file with draft status for wiki:

    ---
    Title: Wiki page
    Layout: wiki
    Tag: Example
    Status: draft
    ---
    This is an example wiki page.

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
