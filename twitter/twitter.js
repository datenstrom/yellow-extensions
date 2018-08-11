// Twitter plugin, https://github.com/datenstrom/yellow-plugins/tree/master/twitter
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

function TwitterMessage(element, options) {
    this.element = element;
    this.options = options ? options : this.parseOptions(element, ["tweetLimit", "borderColor", "linkColor", "ariaPolite"]);
    return (this instanceof TwitterMessage ? this : new TwitterMessage());
}

TwitterMessage.prototype = {

    // Parse Twitter options
    parseOptions: function(element, keyNames) {
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
    },
    
    // Show Twitter error
    onShowError: function(result) {
        var node = document.createTextNode("Twitter '"+this.options.id+"' not available!");
        this.element.appendChild(node);
    },
    
    // Request Twitter data
    request: function() {
        if (twttr.widgets) {
            var thisObject = this, promise;
            switch (this.options.mode) {
                case "tweet":
                    promise = twttr.widgets.createTweet(this.options.id, this.element, this.options);
                    promise.then(function(result) { if(result==null) { thisObject.onShowError(result); }});
                    break;
                case "timeline":
                    promise = twttr.widgets.createTimeline({ sourceType: "url", url: "https://twitter.com/"+this.options.id }, this.element, this.options);
                    promise.then(function(result) { if(result==null) { thisObject.onShowError(result); }});
                    break;
            }
        } else {
            this.onShowError("offline");
        }
    }
};

var initTwitterFromDOM = function() {
    var elements = document.querySelectorAll(".twitter");
    var buttons = document.querySelectorAll(".twitter-follow-button");
    if (elements.length || buttons.length) {
        if (typeof twttr==="undefined") {
            var fjs = document.getElementsByTagName("script")[0];
            var js = document.createElement("script");
            js.src = "https://platform.twitter.com/widgets.js";
            js.onload = initTwitterFromDOM;
            fjs.parentNode.insertBefore(js, fjs);
        } else {
            var messages = {};
            for (var i=0, l=elements.length; i<l; i++) {
                messages[i] = new TwitterMessage(elements[i]);
                messages[i].request();
            }
        }
    }
};

window.addEventListener("load", initTwitterFromDOM, false);
