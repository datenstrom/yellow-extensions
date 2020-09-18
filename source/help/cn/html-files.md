---
Title: HTML模板文件
TitleSlug: html-files
---
在这里修改网站的版面布局

## 自定义HTML模板

修改网站的[HTML](https://www.w3schools.com/html/)代码来改变版面布局，让我们看看如何制作布局模板。默认的布局在[系统设置](adjusting-system#system-settings)里定义，在每个页面文件顶部的[设置项](markdown-cheat-sheet#settings)可以定义不同的布局模板，例如 `Layout: default`。

这是`system/layouts/default.html`文件的一段范例：

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContent() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

这是用于显示页面内容和附加HTML代码的布局范例：

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContent() ?>
<p>Hello world</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

这是用于显示页面内容和附加博客页面的布局范例：

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContent() ?>
<?php $pages = $this->yellow->content->index()->filter("layout", "blog")->sort("published", false)->limit(5) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<?php $this->yellow->page->setHeader("Cache-Control", "max-age=60") ?>
<table>
<?php foreach ($pages as $page): ?>
<tr>
<td><a href="<?php echo $page->getLocation(true) ?>"><?php echo $page->getHtml("title") ?></a></td>
<td><?php echo $page->getHtml("author") ?></td>
<td><?php echo $page->getDateHtml("published") ?></td>
</tr>
<?php endforeach ?>
</table>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

主题可以有自己的模板文件以覆盖现有的布局，给布局文件添加一个主题名，例如文件`system/layouts/default.html`可用于任何主题，而文件`system/layouts/stockholm-default.html`仅用于`Theme: Stockholm`这个主题。
