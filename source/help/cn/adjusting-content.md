---
Title: 修改网站内容
TitleSlug:  adjusting-content
---
所有内容放在`content`文件夹内，可以在此编辑您的网站。

    ├── content
    │   ├── 1-home
    │   └── shared
    ├── media
    └── system

在您的网站能找到`content`，每个文件夹内有一个名为`page.md`文件或者`文件夹同名.md`的文件。您也可以添加更多的文件和文件夹。基本上在文件管理器是什么样在你的网站上就是什么样。

## 文件和文件夹

导航菜单是由程序根据`content`内结构自动建立的：

1. 文件夹可以带数字前缀，例如 `1-home` 或者 `9-about`
2. 文件可以带日期前缀便于归类，例如 `2013-04-07-blog-example.md`
3. 没有前缀表示没有特殊意义

前缀和后缀会从网站路径中被移除，所以网址看起来会更好些。例如`content/9-about/`这个文件夹，在您网站上的路径是`http://website/about/`。再如`content/9-about/privacy.md`这个文件会变成`http://website/about/privacy`。

有两个例外，在`home`文件夹内不能有子文件夹，因为它负责首页，并在您的网站上可以通过`http://website/`访问。`shared`文件夹只能包含在其他页面，不能通过网站访问。

## Markdown语法

您可以用[Markdown](markdown-cheat-sheet)来编辑网页，用你喜欢的文本编辑器打开`content/1-home/page.md`这个文件，可以看到页面的设置项和页面内容，可以修改页面顶部的`Title`和其他[设置项](markdown-cheat-sheet#settings)，这有个范例：

    ---
    Title: Home
    ---
    Your website works!
    
    [edit - You can edit this page] or use your text editor.

    You can install more features and themes.
    [Learn more](https://datenstrom.se/yellow/help/).

格式化文本：

    常规 **粗体** *斜体* ~~删除线~~ `代码`

制作清单：

    * item one
    * item two
    * item three
