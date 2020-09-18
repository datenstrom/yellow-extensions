---
Title: 修改系统设置
TitleSlug: adjusting-system
---
所有设置文件放在`system`文件夹内，可以在这里对网站进行改动。

    ├── content
    ├── media
    └── system
        ├── extensions
        ├── layouts
        ├── settings
        ├── themes
        └── trash

已安装的扩展放在`extensions`文件夹，可以通过`layouts`和`themes`文件夹来调整网站外观，配置文件放在`settings`文件夹，`trash`文件夹是存放已删除的文件。

## 系统设置

主配置文件是`system/settings/system.ini`，这是一个范例：

    Sitename: Anna Svensson Design
    Author: Anna Svensson
    Email: anna@svensson.com
    Language: en
    Layout: default
    Theme: stockholm
    Parser: markdown
    Status: public

可以在此定义系统设置，例如网站名称和网站管理员邮箱等。在页面文件顶部可进行单独的[设置](markdown-cheat-sheet#settings)，新安装时应该设置`Sitename`、`Author`和`Email`。

## 语言设置

还有一个配置文件是`system/settings/language.ini`，以下是范例：

    Language: en
    CoreDateFormatMedium: Y-m-d
    media/images/photo.jpg: This is an example image

可以在此定义文本设置，例如文字部分和图片标题，文本设置包含`Language`和其他设置项。可以定义任何文本和调整语言的[默认设置](https://github.com/datenstrom/yellow-extensions/blob/master/source/english/english.txt "语言翻译")。

## 用户设置

所有帐号信息储存在`system/settings/user.ini`文件，以下是范例：

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

可以通过浏览器[在线编辑](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit)和[命令行](https://github.com/datenstrom/yellow-extensions/tree/master/source/command)来创建帐号和修改密码。用户帐号包含`Email`和其他设置项。如果不希望用户可以编辑所有页面，可以修改用户的home页面来加以限制。
