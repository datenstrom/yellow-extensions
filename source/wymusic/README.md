wymusic 0.8.4
================
网易云音乐扩展。以前Yellow主程序版本还在0.5.32时，根据官方image插件改写了wymusic插件，对，那时候叫plugins。后来主程序架构几经改版重构，现在Yellow版本已经是0.8.24，插件也早已改为扩展extensions，扩展程序的代码更简捷了。所以根据Soundcloud的扩展把网易云音乐的扩展也升到了0.8.xx版本。

<p align="center"><img src="wymusic-screenshot.png?raw=true" width="389" height="536" alt="Screenshot截图"></p>

## 如何添加歌曲

用快捷键`[wymusic]`插入歌曲。
 
可用以下参数自定义，除了第一个参数其他都是可选项：

`Id` = 就是[网易云音乐](https://music.163.com)官网url链接`id=`后面的数字串，例如这首歌：`https://music.163.com/#/song?id=17614719`。  
`Style` = 层叠样式，例如：左对齐`left`，居中`center`，右对齐`right`。  
`autop` = 是否自动播放，1自动播放，默认是0不自动播放。  
`Width` = 宽度值，用像素表示，默认是310像素。  
`Height` = 高度值，用像素表示，默认是66像素。高度设为32则是迷你模式（无唱片图片）。   

## 范例

插入歌曲：

    [wymusic 17614719]
    [wymusic 17614719 right] - 右对齐
    [wymusic 17614719 - 1] - 自动播放
    [wymusic 17614719 - 1 - 32] - 迷你模式自动播放

插入歌单：

需提前安装网易云音乐歌单插件`wymusicl`[歌单扩展](https://github.com/hysonlee/yellow-extensions/raw/master/zip/wymusic.zip)。

    [wymusicl 5237302650]
    [wymusicl 5237302650 - 1] - 歌单自动播放
    [wymusicl 5237302650 - 1 - 90] - 将`height`设为90即精简模式（不显示歌曲明细）；设32即迷你无图模式同上。

## 其他设置

在系统配置文件`system/settings/system.ini`可对以下层叠样式设定与设置：

`SoundcloudStyle: ` = 音乐的预设层叠样式，例如`center`居中显示。  
PS.如设置了自动播放歌曲却没播放，请检查是否浏览器禁止网站自动播放。  
PS2.如点了播放按钮歌曲却没播放，请去官网检查该歌曲是否已下架，网易的歌曲经常莫名其妙下架的。
PS3.已下架的歌曲推荐存档上传服务器`media/audios/`后用[Audio扩展](https://github.com/schulle4u/yellow-extensions-schulle4u/tree/master/audio)来弥补。

## 安装

[下载扩展](https://github.com/hysonlee/yellow-extensions/raw/master/zip/wymusic.zip)并将zip压缩包复制到您网站的`system/extensions`文件夹，Safari浏览器右键保存。

如后续打好包上传并被Yellow官方收录后，也可以在CLI模式下安装：切换到`yellow.php`所在的路径，`php yellow.php install wymusic`。

## 开发

hyson. [获得帮助](./).

<p>
<a href="README-en.md">English README</a>
</p>
