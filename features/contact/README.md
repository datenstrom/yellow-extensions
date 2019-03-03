Contact 0.8.2
=============
Email contact page.

<p align="center"><img src="contact-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/contact.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `contact.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to use a contact page

The contact page is available on your website as `http://website/contact/`. The contact email is send to the webmaster, which is defined in file `system/settings/system.ini`. You can set a different `Author` and `Email` in the [settings](https://developers.datenstrom.se/help/markdown-cheat-sheet#settings) at the top of a page. To show a contact form add a `[contact]` shortcut with an optional location. You can also add a link to the contact page somewhere on your website. See example below.

## How to configure a contact page

The following settings can be configured in file `system/settings/system`:

`Author` = name of the webmaster  
`Email` = email of the webmaster  
`ContactLocation` = contact page location  
`ContactSpamFilter` = spam filter as regular expression  

## Example

Adding a contact form:

    [contact]
    [contact /en/contact/]
    [contact /de/contact/]

Content file with contact form:

    ---
    Title: Example page
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [contact]

Footer file with contact page:

    ---
    Title: Footer
    Status: hidden
    ---
    [Contact](/contact/) &nbsp; 
    [Made with Datenstrom Yellow](https://datenstrom.se/yellow/)

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
