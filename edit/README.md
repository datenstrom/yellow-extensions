Edit plugin 0.7.31
==================
Edit your website in a web browser. [See demo](https://developers.datenstrom.se).

<p align="center"><img src="edit-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install plugin

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/edit.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `edit.zip` into your `system/plugins` folder.

To uninstall delete the [plugin files](update.ini).

## How to edit a website

The login page is available on your website as `http://website/edit/`. Log in with your user account. You can browse your website, make some changes and see the result immediately. It's a great way to update your website. To show an edit link add an `[edit]` shortcut to a page. See example below.

## How to create a user account

The first option is to create a user account in a web browser. Go to the login page. You can create a user account and change your password. The webmaster needs to approve new user accounts. The webmaster's email is defined in file `system/config/config.ini`.

The second option is to create a user account at the [command line](https://github.com/datenstrom/yellow-plugins/tree/master/command). Open a terminal window. Go to your installation folder, where the `yellow.php` is. Type `php yellow.php user add` followed by email, password and an optional name. All user accounts are stored in file `system/config/user.ini`. See example below.

## How to configure a website

The following settings can be configured in file `system/config/config.ini`:

`Author` = name of the webmaster  
`Email` = email of the webmaster  
`SafeMode` = enable [safe mode](https://developers.datenstrom.se/help/security-configuration#safe-mode) with restrictions, 1 or 0  
`EditLocation` = login page location  
`EditUploadNewLocation` = location for new media file  
`EditUploadExtensions` = file extensions for upload, `none` to disable  
`EditKeyboardShortcuts` = keyboard shortcuts and commands  
`EditToolbarButtons` = toolbar buttons, `none` to disable  
`EditEndOfLine` = line endings, e.g. `auto`, `lf`, `crlf`  
`EditLoginRestrictions` = enable [login restrictions](https://developers.datenstrom.se/help/security-configuration#login-restrictions), 1 or 0  
`EditLoginSessionTimeout` = login session in seconds  
`EditBruteForceProtection` = number of failed login attempts  

## Example

Content file with edit link:

```
---
Title: Home
---
Your website works! 

[edit - You can edit this page] or use your text editor.  
```

Configuring different toolbar buttons:

```
EditToolbarButtons: auto 
EditToolbarButtons: preview, format, bold, italic, code, list, link, file, undo, redo, markdown
EditToolbarButtons: preview, bold, italic, h1, h2, h3, code, quote, ul, ol, link, file, markdown
EditToolbarButtons: preview, format, bold, italic, separator, quote, code, link, file, separator, emojiawesome
```

Creating a user account at the command line:
 
`php yellow.php user`  
`php yellow.php user add email@example.com password`  
`php yellow.php user remove email@example.com`  

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
