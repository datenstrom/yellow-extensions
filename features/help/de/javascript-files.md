---
Title: JavaScript-Dateien
---
Wie man dynamische Funktionen seiner Webseite anpasst.

## JavaScript anpassen

Um deine Webseiten noch weiter anzupassen, kannst du [JavaScript](https://www.w3schools.com/js/) benutzen. Damit kannst du dynamische Funktionen für Webseiten erstellen. Du kannst JavaScript in eine Datei speichern die einen ähnlichen Namen hat wie die CSS-Datei. Sie wird dann automatisch eingebunden.

Hier ist eine Beispiel-Datei `system/resources/custom.js`:

``` javascript
var ready = function() {
	console.log("Hello world");
	// Add more JavaScript code here
}
window.addEventListener("load", ready, false);
```
