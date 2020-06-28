---
Title: JavaScript files
---
Here's how to adjust dynamic features of your website.

## Customising JavaScript

To adjust your website even more you can use [JavaScript](https://www.w3schools.com/js/). This allows you to create dynamic features for websites. You can save JavaScript into a file which has a similar name as the CSS file. Then it will be automatically included.

Here's an example file `system/resources/custom.js`:

``` javascript
var ready = function() {
	console.log("Hello world");
	// Add more JavaScript code here
}
window.addEventListener("load", ready, false);
```
