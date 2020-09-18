---
Title: CSS层叠样式
TitleSlug: css-files
---
学习如何调整网站的外观。

## 自定义CSS

修改网站的[CSS](https://www.w3schools.com/css/)来改变主题外观，我们来看看主题是如何工作的。默认的主题在[系统设置](adjusting-system#system-settings)里定义，在每个页面文件顶部的[设置项](markdown-cheat-sheet#settings)可以定义不同的主题，例如 `Theme: custom`。

这是`system/themes/custom.css`的一段范例：

``` css
.page {
    background-color: #fc4;
    color: #fff;
    text-align:center; 
}
```

## 自定义主题

在`system/themes`文件夹包含所有主题文件，可以在此存放主题用到的图片和字体文件等。每个网站有个小图标(icon)有时被称作favicon，例如在浏览器地址栏会显示这个icon。
