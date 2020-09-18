---
Title: 如何开始搭建小博客
TitleSlug: how-to-make-a-small-blog
---
学习如何搭建自己的博客

## 安装博客

1. [下载并解压Datenstrom Yellow](https://github.com/datenstrom/yellow/archive/master.zip).
2. 把所有文件复制到服务器。
3. 用浏览器访问您的网站并选择'Blog'。

您的博客已经可用了。安装包自带两个页面'Home'和'Blog'，这只是让你上手的一个范例，可以随意更改它。如果你想把博客作为首页，可以把home删掉。

如果安装碰到了问题，请见[故障排除](troubleshooting)。
 
## 编写博客

查看`content`这个文件夹，您博客的所有页面都在blog文件夹内。打开`2013-04-07-blog-example.md`这个文件，可以看到该页面的设定和内文，在页面顶部可以修改`Title`和其他[设定项](markdown-cheat-sheet#settings)，设定的下面是博客内容可以用[Markdown](markdown-cheat-sheet)来书写。这是个范例：

```
---
Title: 演示博文
Published: 2013-04-07
Author: Datenstrom
Layout: blog
Tag: 标签
---
这是一个示范博客页面

从前有座山，山上有座庙，
庙里住着老和尚和小和尚，老和尚在给小和尚讲故事，
故事的内容是：
从前有座山，山上有座庙，
庙里住着老和尚和小和尚，老和尚在给小和尚讲故事。
...
```

在blog文件夹内添加文件来创建博客页面。在页面顶部设定`Published`（发布时间）和其他设置项，日期应该按照 YYYY-MM-DD 格式来写，发布时间会被用来归类检索页面，可以用`Tag`（标签）来将相似页面进行分组归类，这是另一个范例：

```
---
Title: Fika咖啡好喝
Published: 2016-06-01
Author: Datenstrom
Layout: blog
Tag: 示范, 咖啡
---
Fika是瑞典的习俗。这是人们喝咖啡的社交场所
聚集在一起喝杯咖啡或茶。你可以和fika一起
在工作的同事。您可以邀请您的朋友参加fika。菲卡就是这样
它是瑞典生活中的重要组成部分，既是动词又是名词。
你多久fika？
```

现在我们用[Youtube扩展](https://github.com/datenstrom/yellow-extensions/tree/master/source/youtube)来添加一个视频：

```
---
Title: Fika咖啡好喝
Published: 2016-06-01
Author: Datenstrom
Layout: blog
Tag: 示范, 咖啡,视频
---
Fika是瑞典的习俗。这是人们喝咖啡的社交场所
聚集在一起喝杯咖啡或茶。你可以和fika一起
在工作的同事。您可以邀请您的朋友参加fika。菲卡就是这样
它是瑞典生活中的重要组成部分，既是动词又是名词。
你多久fika？

[youtube wnBHyfMtK5o]
```

让访客点开博客页面再显示视频，可以在需要的位置用`[--more--]`添加分页符：

```
---
Title: Fika咖啡好喝
Published: 2016-06-01
Author: Datenstrom
Layout: blog
Tag: 示范, 咖啡,视频
---
Fika是瑞典的习俗。这是人们喝咖啡的社交场所
聚集在一起喝杯咖啡或茶。你可以和fika一起
在工作的同事。您可以邀请您的朋友参加fika。菲卡就是这样
它是瑞典生活中的重要组成部分，既是动词又是名词。
你多久fika？[--more--]

[youtube wnBHyfMtK5o]
```

可以用[shortcuts（快捷键）](https://github.com/datenstrom/yellow-extensions/tree/master/source/blog#how-to-show-blog-information)展示关于博客的信息。

## 展示页眉

创建`content/shared/header.md`文件来展示页眉（全局）。您也可以在`blog`文件夹内新建`header.md`文件，这样的页眉只会展示在相同文件夹的页面。这是一个范例：

```
---
Title: Header
Status: shared
---
我喜欢Markdown语言.
```

## 展示页脚

创建`content/shared/footer.md`文件来展示页脚（全局）。您也可以在`blog`文件夹内新建`footer.md`文件，这样的页脚只会展示在相同文件夹的页面。这是一个范例：

```
---
Title: Footer
Status: shared
---
[由Datenstrom Yellow强力驱动](https://datenstrom.se/yellow/)
```

## 获取扩展

在[extensions](https://github.com/datenstrom/yellow-extensions)有适合博客的各种扩展，这里例举一些：

* [如何显示留言评论](https://github.com/datenstrom/yellow-extensions/tree/master/source/disqus)
* [如何启用搜索](https://github.com/datenstrom/yellow-extensions/tree/master/source/search)
* [如何启动feed订阅](https://github.com/datenstrom/yellow-extensions/tree/master/source/feed)
* [如何启用草稿页](https://github.com/datenstrom/yellow-extensions/tree/master/source/draft)
* [如何生成静态网站](https://github.com/datenstrom/yellow-extensions/tree/master/source/command)
