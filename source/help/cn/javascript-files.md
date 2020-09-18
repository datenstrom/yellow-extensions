---
Title: JS脚本文件
TitleSlug: javascript-files
---
学习如何调整网站的动态功能

## 自定义JS脚本

要进一步调整网站可以使用[JS脚本](https://www.w3schools.com/js/)，这可以为网站创建动态动能，可以把脚本保存到一个.js文件，类似.css文件那样，这样就可以自动加载了。

以下的`system/themes/custom.js`文件的一段范例：

``` javascript
var ready = function() {
	console.log("Hello world");
	// Add more JavaScript code here
}
window.addEventListener("load", ready, false);
```
