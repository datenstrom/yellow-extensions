---
Title: 修改媒体文件 
TitleSlug: adjusting-media
---
所有媒体文件放在`media`文件夹内，可以在这里存放图片和其他文件。

    ├── content
    ├── media
    │   ├── downloads
    │   ├── images
    │   └── thumbnails
    └── system

供下载的文件放在`downloads`文件夹，`images`文件夹是存放图片的地方，`thumbnails`文件夹存放缩略图。您可以根据需要创建并管理更多的文件、夹文件。本质上这里的任何文件都可以被下载。

## 图片

可以使用[image扩展](https://github.com/datenstrom/yellow-extensions/tree/master/source/image)来插入图片。要添加图片，把图片复制到`images`文件夹并创建`[image]`快捷键。支持的图片格式有GIF, JPG, PNG and SVG，这是个范例：

    [image photo.jpg]
    [image photo.jpg Example]
    [image photo.jpg "这是图片说明"]

图片样式：

    [image photo.jpg Example left]
    [image photo.jpg Example center]
    [image photo.jpg Example right]

图片尺寸：

    [image photo.jpg Example - 64 64]
    [image photo.jpg Example - 320 200]
    [image photo.jpg Example - 50%]

## 视频

可以使用[Youtube扩展](https://github.com/datenstrom/yellow-extensions/tree/master/source/youtube)来嵌入视频：

    [youtube fhs55HEl-Gc]
    [youtube fhs55HEl-Gc left 200 112]
    [youtube fhs55HEl-Gc right 200 112]
