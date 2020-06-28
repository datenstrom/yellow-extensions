Edit 0.8.26
===========
Edit your website in a web browser.

<p align="center"><img src="edit-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/edit.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `edit.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to edit a website

The login page is available on your website as `http://website/edit/`. Log in with your user account. You can browse your website, make some changes and see the result immediately. It's a great way to update your website. You can use an `[edit]` shortcut to show an edit link.

## How to create a user account

The first option is to create a user account in a web browser. Go to the login page. You can create a user account and change your password. The webmaster needs to approve new user accounts. The webmaster's email is defined in file `system/settings/system.ini`.

The second option is to create a user account at the [command line](https://github.com/datenstrom/yellow-extensions/tree/master/features/command). Open a terminal window. Go to your installation folder, where the `yellow.php` is. Type `php yellow.php user add` followed by email and password. All user accounts are stored in file `system/settings/user.ini`.

## How to restrict a user account

If you don't want that pages are modified, then restrict user accounts. Open file `system/settings/user.ini` and change [home page and access rights](#settings-user). Users are allowed to edit pages within their home page, but nowhere else.

If you don't want that user accounts are created, then restrict the login page. Open file `system/settings/system.ini` and change `EditLoginRestriction: 1`. Users are allowed to reset their password, but cannot create a new user account.

## Settings

The following settings can be configured in file `system/settings/system.ini`:

`Author` = name of the webmaster  
`Email` = email of the webmaster  
`EditLocation` = login page location  
`EditUploadNewLocation` = location for new media file  
`EditUploadExtensions` = file formats for upload, `none` to disable  
`EditKeyboardShortcuts` = keyboard shortcuts and commands, `none` to disable  
`EditToolbarButtons` = toolbar buttons, `auto` for automatic detection, `none` to disable  
`EditNewFile` = content file for new page  
`EditEndOfLine` = line endings, e.g. `auto`, `lf`, `crlf`  
`EditUserPasswordMinLength` = minimum length of passwords  
`EditUserHome` = default home page location for new user account  
`EditUserAccess` = default user access rights for new user account  
`EditLoginRestriction` = enable login restriction, 1 or 0  
`EditLoginSessionTimeout` = validity of login in seconds  
`EditBruteForceProtection` = number of failed login attempts  

The following settings can be configured in file `system/settings/text.ini`:

`EditLoginTitle` = welcome text on login page  
`EditMailFooter` = footer for email messages  

<a id="settings-user"></a>The following settings can be configured in file `system/settings/user.ini`:

`Email` = email of the user  
`Name` =  name of the user  
`Language` = language of the user  
`Home` = home page location  
`Access` = user access rights, [supported access rights](#settings-access)  
`Hash` = encrypted password  
`Stamp` = unique token for authentication  
`Pending` = pending changes  
`Failed` = number of failed login attempts  
`Modified` = modification date, YYYY-MM-DD format  
`Status` = user status, [supported status values](#settings-status)  

<a id="settings-access"></a>The following user access rights are supported:

`create` =  user can create page  
`edit` = user can edit page  
`delete` = user can delete page  
`upload` = user can upload media files  
`system` = user can [change system settings](https://github.com/datenstrom/yellow-extensions/tree/master/features/core#settings-system)  
`update` = user can [update website](https://github.com/datenstrom/yellow-extensions/tree/master/features/update)  

<a id="settings-status"></a>The following user status values are supported:

`active` = user is active  
`inactive` = user has been deactivated temporarily  
`unconfirmed` = user has not confirmed user account  
`unapproved` = user has not been approved by webmaster  
`unverified` = user has not confirmed new email address  
`unchanged` = user has not confirmed pending changes  
`removed` = user has not confirmed pending deletion  

<a id="settings-files"></a>The following files can be configured:

`content/shared/page-new-default.md` = content file for new page  
`content/shared/page-new-blog.md` = content file for new blog page  
`content/shared/page-new-wiki.md` = content file for new wiki page  
`content/shared/page-error-404.md` = content file for error page  

## Examples

Content file with edit link:

    ---
    Title: About
    ---
    For people who make small websites. [edit - Log in].
    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.
    
    This website is made with [Datenstrom Yellow](https://datenstrom.se/yellow/). 

Configuring a user account with maximum user access rights:

```
Email: anna@svensson.com
Name: Anna Svensson
Language: en
Home: /
Access: create, edit, delete, upload, system, update
Hash: $2y$10$j26zDnt/xaWxC/eqGKb9p.d6e3pbVENDfRzauTawNCUHHl3CCOIzG
Stamp: 21196d7e857d541849e4
Pending: none
Failed: 0
Modified: 2000-01-01 13:37:00
Status: active
```

Configuring a user account with default user access rights:

```
Email: english@example.com
Name: Niklas Svensson
Language: en
Home: /
Access: create, edit, delete, upload
Hash: $2y$10$zG5tycOnAJ5nndGfEQhrBexVxNYIvepSWYd1PdSb1EPJuLHakJ9Ri
Stamp: e4138bbd338881147a5d
Pending: none
Failed: 0
Modified: 2000-01-01 13:37:00
Status: active
```

Configuring a user account with restricted user access rights:

```
Email: english@example.com
Name: Demo
Language: en
Home: /demo/
Access: edit, upload
Hash: $2y$10$zG5tycOnAJ5nndGfEQhrBexVxNYIvepSWYd1PdSb1EPJuLHakJ9Ri
Stamp: f3e71699df534913a823
Pending: none
Failed: 0
Modified: 2000-01-01 13:37:00
Status: active
```

Configuring different toolbar buttons:

```
EditToolbarButtons: auto 
EditToolbarButtons: format, bold, italic, strikethrough, code, separator, list, link, file, undo, redo
EditToolbarButtons: bold, italic, h1, h2, h3, code, quote, ul, ol, tl, link, file, preview, help
EditToolbarButtons: format, bold, italic, separator, quote, code, link, file, separator, emojiawesome
```

Showing available user accounts at the command line:

`php yellow.php user`  

Updating user accounts at the command line:
 
`php yellow.php user add email@example.com password`  
`php yellow.php user change email@example.com password`  
`php yellow.php user remove email@example.com`  

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
