---
Title: 如何开始搭建小维基
TitleSlug: how-to-make-a-small-wiki
---
学习如何搭建自己的维基 (Wiki )

## 安装维基

1. [下载并解压Datenstrom Yellow](https://github.com/datenstrom/yellow/archive/master.zip).
2. 把所有文件复制到服务器。
3. 用浏览器访问您的网站并选择'Wiki'。

您的维基已经可用了。安装包自带两个页面'Home'和'Wiki'，这只是让你上手的一个范例，可以随意更改它。如果你想把维基作为首页，可以把home删掉。

如果安装碰到了问题，请见[故障排除](troubleshooting)。

## 编写维基

查看`content`这个文件夹，您维基的所有页面都在wiki文件夹内。打开`wiki-page.md`这个文件，可以看到该页面的设定和内文，在页面顶部可以修改`Title`和其他[设定项](markdown-cheat-sheet#settings)，设定的下面是维基内容可以用[Markdown](markdown-cheat-sheet)来书写。这是个范例：

```
---
Title: Wiki page
Layout: wiki
Tag: Example
---
这是一个示范维基页面

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, 
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. 
```

在wiki文件夹内添加文件来创建维基页面。在页面顶部设定`Title`（标题）和其他设置项，可以用`Tag`（标签）来将相似页面进行分组归类，这是另一个范例：

```
---
Title: Coffee is good for you
Layout: wiki
Tag: Example, Coffee
---
Coffee is a beverage made from the roasted beans of the coffee plant.

1. Start with fresh coffee. Coffee beans start losing quality immediately 
   after roasting and grinding. The best coffee is made from beans ground 
   right after roasting. 
2. Brew a cup of coffee. Coffee is prepared with different methods and 
   additional flavorings such as milk and sugar. There are Espresso, Filter 
   coffee, French press, Italian Moka, Turkish coffee and many more. Find 
   out what's your favorite.
3. Enjoy.
```

现在我们用[Youtube扩展](https://github.com/datenstrom/yellow-extensions/tree/master/source/youtube)来添加一个视频：

```
---
Title: Coffee is good for you
Layout: wiki
Tag: Example, Coffee, Video
---
Coffee is a beverage made from the roasted beans of the coffee plant.

1. Start with fresh coffee. Coffee beans start losing quality immediately 
   after roasting and grinding. The best coffee is made from beans ground 
   right after roasting. 
2. Brew a cup of coffee. Coffee is prepared with different methods and 
   additional flavorings such as milk and sugar. There are Espresso, Filter 
   coffee, French press, Italian Moka, Turkish coffee and many more. Find 
   out what's your favorite.
3. Enjoy.

[youtube SUpY1BT9Xf4]
```

可以用[shortcuts（快捷键）](https://github.com/datenstrom/yellow-extensions/tree/master/source/wiki#how-to-show-wiki-information)展示关于维基的信息。

## 展示页眉

创建`content/shared/header.md`文件来展示页眉（全局）。您也可以在`wiki`文件夹内新建`header.md`文件，这样的页眉只会展示在相同文件夹的页面。这是一个范例：
```
---
Title: Header
Status: shared
---
我喜欢Markdown语言.
```

## 展示页脚

创建`content/shared/footer.md`文件来展示页脚（全局）。您也可以在`wiki`文件夹内新建`footer.md`文件，这样的页脚只会展示在相同文件夹的页面。这是一个范例：

```
---
Title: Footer
Status: shared
---
[由Datenstrom Yellow强力驱动](https://datenstrom.se/yellow/)
```

## 获取扩展
在[extensions](https://github.com/datenstrom/yellow-extensions)有适合维基的各种扩展，这里例举一些：

* [如何生成内容目录ToC](https://github.com/datenstrom/yellow-extensions/tree/master/source/toc)
* [如何启用搜索](https://github.com/datenstrom/yellow-extensions/tree/master/source/search)
* [如何启用联系人页面](https://github.com/datenstrom/yellow-extensions/tree/master/source/contact)
* [如何启用草稿页](https://github.com/datenstrom/yellow-extensions/tree/master/source/draft)
* [如何生成静态网站](https://github.com/datenstrom/yellow-extensions/tree/master/source/command)
