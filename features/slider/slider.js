// Slider extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/slider
// Copyright (c) 2013-2019 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

var initFlickityFromDOM = function() {

    // Parse slider options from DOM
    var parseOptions = function(element, keyNames) {
        var options = {};
        for (var i=0; i<element.attributes.length; i++) {
            var attribute = element.attributes[i], key, value;
            if (attribute.nodeName.substr(0, 5)=="data-") {
                key = attribute.nodeName.substr(5);
                for (var j=0; j<keyNames.length; j++) {
                    if (key==keyNames[j].toLowerCase()) {
                        key = keyNames[j];
                        break;
                    }
                }
                switch (attribute.nodeValue) {
                    case "true":    value = true; break;
                    case "false":   value = false; break;
                    default: value = attribute.nodeValue;
                }
                options[key] = value;
            }
        }
        return options;
    };
    
    // Parse slider and picture index from URL
    var parseHash = function() {
        var hash = window.location.hash.substring(1),
        params = {};
        if (hash.length<5) return params;
        var vars = hash.split("&");
        for (var i=0; i<vars.length; i++) {
            if (!vars[i]) continue;
            var pair = vars[i].split("=");
            if (pair.length<2) continue;
            params[pair[0]] = pair[1];
        }
        return params;
    };
    
    // Initialise slider and bind events
    var sliders = {};
    var elements = document.querySelectorAll(".flickity");
    for (var i=0, l=elements.length; i<l; i++) {
        var options = parseOptions(elements[i],
            ["prevNextButtons", "pageDots", "arrowShape", "lazyLoad", "autoPlay", "initialIndex",
             "freeScroll", "wrapAround", "asNavFor", "cellSelector", "cellAlign"]);
        if (options.autoPlay) options.autoPlay = parseInt(options.autoPlay);
        sliders[i] = new Flickity(elements[i], options);
        if (options.clickable) sliders[i].on("staticClick", function() { this.next(options.wrapAround); });
    }
    
    // Check if URL contains slider and picture index
    if (elements.length) {
        var params = parseHash();
        if (params.sid>0 && params.sid<=elements.length && params.pid>0) {
            sliders[params.sid-1].select(params.pid-1, false, true);
        }
    }
};

window.addEventListener("load", initFlickityFromDOM, false);
