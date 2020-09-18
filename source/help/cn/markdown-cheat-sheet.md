---
Title: Markdown速查表
TitleSlug: markdown-cheat-sheet
---
Markdown是编写网页的实用工具。

## 基础

格式化文本：

    常规 **粗体** *斜体* ~~删除线~~ `代码`

无序清单：

    * 第一项
    * 第二项
    * 第三项

有序清单：

    1. 第一项
    2. 第二项
    3. 第三项

任务列表：

    - [x] 买菜
    - [ ] 扫地
    - [ ] 洗碗

生成标题：

    # 标题1
    ## 标题 2
    ### 标题 3

生成引用：

    > 引用
    >> 引用引文
    >>> 引用来自引文的引文

生成链接：

    [链接到页面](/help/how-to-make-a-website)
    [链接到文件](/media/downloads/yellow.pdf)
    [链接到网站](https://datenstrom.se)

添加图片（需image扩展）：

    [image photo.jpg]
    [image photo.jpg Example]
    [image photo.jpg "这是图片说明"]

添加图片（Markdown标准写法）：

    ![image](photo.jpg)
    ![image](photo.jpg "Example")
    ![image](photo.jpg "这是图片说明")

## 附加功能

生成表格：

    | Coffee     | Milk | Strength |
    |------------|------|----------|
    | Espresso   | no   | strong   |
    | Macchiato  | yes  | medium   |
    | Cappuccino | yes  | weak     |

制作脚注：

    Text with a footnote[^1] and some more footnotes.[^2] [^3]
    
    [^1]: Here's the first footnote
    [^2]: Here's the second footnote
    [^3]: Here's the third footnote

源代码显示：

    ```
    Source code will be shown unchanged.
    function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    ```

分段：

    这是第一段。文本可以横跨多行
    并可用一个空行来划分下一段。

    这是第二段。

换行：

    这是第一行⋅⋅
    这是第二行⋅⋅
    这是第三行⋅⋅
    
    行尾的空格键用点(⋅)表示。

通知栏：

    ! 这是一条警告通知
    
    !! 这是一条错误通知
    
    !!! 这是一条提醒通知

使用CSS：

    ! {.class}
    ! Here's a notice with custom class.
    ! Text can span over several lines
    ! and contain Markdown formatting.

使用HTML：

    <strong>Text with HTML</strong> can be used optionally.
    <a href="https://datenstrom.se" target="_blank">Open link in new tab</a>.

## 快捷键

`[image photo.jpg Example - 50%]` = [添加缩略图](https://github.com/datenstrom/yellow-extensions/tree/master/source/image)  
`[gallery photo.*jpg - 20%]` = [添加相册](https://github.com/datenstrom/yellow-extensions/tree/master/source/gallery)  
`[slider photo.*jpg]` = [添加带滑动条的相册](https://github.com/datenstrom/yellow-extensions/tree/master/source/slider)  
`[youtube fhs55HEl-Gc]` = [嵌入Youtube视频](https://github.com/datenstrom/yellow-extensions/tree/master/source/youtube)  
`[soundcloud 101175715]` = [嵌入Soundcloud音乐](https://github.com/datenstrom/yellow-extensions/tree/master/source/soundcloud)  
`[twitter datendeveloper]` = [嵌入Twitter消息](https://github.com/datenstrom/yellow-extensions/tree/master/source/twitter)  
`[instagram BISN9ngjV2-]` = [嵌入Instagram图片](https://github.com/datenstrom/yellow-extensions/tree/master/source/instagram)  
`[googlecalendar en.swedish#holiday]` = [嵌入Google日历](https://github.com/datenstrom/yellow-extensions/tree/master/source/googlecalendar)  
`[googlemap Stockholm]` = [嵌入Google地图](https://github.com/datenstrom/yellow-extensions/tree/master/source/googlemap)  
`[blogchanges /blog/]` = [显示最新的博客页面](https://github.com/datenstrom/yellow-extensions/tree/master/source/blog)  
`[wikichanges /wiki/]` = [显示最新的维基页面](https://github.com/datenstrom/yellow-extensions/tree/master/source/wiki)  
`[fa fa-envelope-o]` = [显示图标和符号](https://github.com/datenstrom/yellow-extensions/tree/master/source/fontawesome)  
`[ea ea-smile]` = [显示emoji表情和彩图](https://github.com/datenstrom/yellow-extensions/tree/master/source/emojiawesome)  
`[yellow]` = [显示网站版本](https://github.com/datenstrom/yellow-extensions/tree/master/source/core)  
`[edit]` = [通过浏览器编辑网站](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit)  
`[toc]` = [显示内容目录ToC](https://github.com/datenstrom/yellow-extensions/tree/master/source/toc)  
`[--more--]` = [添加分页符](https://github.com/datenstrom/yellow-extensions/tree/master/source/blog) 

## 设定项

`Title` = 页面标题  
`TitleContent` = 页面内文标题  
`TitleNavigation` = 页面导航栏标题  
`TitleHeader` = 页面浏览器标题  
`TitleSlug` = 页面网址栏标题，即保存页面文件的文件名  
`Description` = 页面描述  
`Author` = 作者，英文逗号间隔多个作者  
`Email` = 作者邮箱  
`Language` = 页面语言  
`Layout` = 页面布局  
`LayoutNew` = 创建新页面的预设布局  
`Theme` = 页面主题  
`Parser` = 页面解析器  
`Status` = 工作流状态  
`Image` = 页面图像  
`ImageAlt` = 页面图像替代文字  
`Modified` = 页面修改日期，YYYY-MM-DD 格式  
`Published` = 页面发布日期，YYYY-MM-DD 格式  
`Tag` = 页面分类标签，英文逗号间隔多个标签  
`Redirect` = 页面或网址重定向  
