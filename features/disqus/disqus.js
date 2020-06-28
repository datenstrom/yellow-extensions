// Disqus extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/disqus
// Copyright (c) 2013-2020 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

var disqus_config = function () {
    this.page.url = document.getElementById("disqus_thread").getAttribute("data-url");
    this.language = document.getElementById("disqus_thread").getAttribute("data-language");
};
var initDisqusFromDOM = function() {
    if (document.getElementById("disqus_thread")) {
        var shortname = document.getElementById("disqus_thread").getAttribute("data-shortname");
        var fjs = document.getElementsByTagName("script")[0];
        var js = document.createElement("script");
        js.src = "https://"+shortname+".disqus.com/embed.js";
        fjs.parentNode.insertBefore(js, fjs);
    }
};

window.addEventListener("load", initDisqusFromDOM, false);
