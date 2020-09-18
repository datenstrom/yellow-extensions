---
Title: 如何开始搭建小网站
TitleSlug: how-to-make-a-small-website
---
学习如何搭建一个网站

## 网站安装

1. [下载并解压Datenstrom Yellow](https://github.com/datenstrom/yellow/archive/master.zip)。
2. 把所有文件复制到服务器。
3. 用浏览器访问您的网站并选择 'Website'。

您的网站已经可用了。安装包自带一个首页，这只是让你上手的一个范例，可以随意更改它。您可以给添加更多的文件和文件见。

如果安装碰到了问题，请见[故障排除](troubleshooting)。

## 编写网页

查看`content`这个文件夹，您网站的所有页面都放这。打开`content/1-home/page.md`这个文件，可以看到该页面的设定和内文。在页面顶部可以修改`Title`和其他[设定项](markdown-cheat-sheet#settings)，设定的下面可以用[Markdown](markdown-cheat-sheet)来书写内文。这是个范例：

```
---
Title: 首页
---
网站已经上线了！

[edit - 您可以编辑这个页面]或者用自己喜欢的文本编辑器。

可以安装更多的功能和主题。
[了解更多](https://datenstrom.se/yellow/help/).
```

在home文件夹或`content`内的其他文件夹添加文件来新建页面。网站会根据`content`文件夹自动创建[导航](adjusting-content)，这是另一个范例：

```
---
Title: 演示
---
[edit - 您可以编辑这个页面]，帮助文件提供给您更多关于创建网站、博客和维基的信息。
[了解更多](https://datenstrom.se/yellow/help/)。
```

现在我们来添加图片：

```
---
Title: 演示
---
[image photo.jpg 图片说明 rounded]

[edit - 您可以编辑这个页面]，帮助文件提供给您更多关于创建网站、博客和维基的信息。
[了解更多](https://datenstrom.se/yellow/help/)。
```

## 展示页眉

创建`content/shared/header.md`文件来展示页眉（全局）。您也可以在`content`下的任一文件夹新建`header.md`文件，这样的页眉只会展示在相同文件夹的页面。这是一个范例：

```
---
Title: 标题
Status: shared
---
我喜欢Markdown语言.
```

## 展示页脚

创建`content/shared/footer.md`文件来展示页脚（全局）。您同样可以在`content`下的任一文件夹新建`footer.md`文件，这样的页脚只会展示在相同文件夹的页面。这是一个范例：

```
---
Title: 页脚
Status: shared
---
[Made with Datenstrom Yellow](https://datenstrom.se/yellow/)
```

## 获取扩展

在[extensions](https://github.com/datenstrom/yellow-extensions)有适合网站的各种扩展，这里例举一些：

* [图和添加相册](https://github.com/datenstrom/yellow-extensions/tree/master/source/gallery)
* [如何启用搜索](https://github.com/datenstrom/yellow-extensions/tree/master/source/search)
* [如何启用网站地图](https://github.com/datenstrom/yellow-extensions/tree/master/source/sitemap)
* [如何启用联系人页面](https://github.com/datenstrom/yellow-extensions/tree/master/source/contact)
* [如何生成静态网站](https://github.com/datenstrom/yellow-extensions/tree/master/source/command)
