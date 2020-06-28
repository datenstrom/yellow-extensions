<?php
// Disqus extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/disqus
// Copyright (c) 2013-2020 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowDisqus {
    const VERSION = "0.8.3";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("disqusShortname", "yellow");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="disqus" && ($type=="block" || $type=="inline")) {
            $shortname = $this->yellow->system->get("disqusShortname");
            $url = $page->get("pageRead");
            $language = $page->get("language");
            $output = "<div id=\"disqus_thread\" data-shortname=\"".htmlspecialchars($shortname)."\" data-url=\"".htmlspecialchars($url)."\" data-language=\"$language\"></div>\n";
        }
        return $output;
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header") {
            $extensionLocation = $this->yellow->system->get("coreServerBase").$this->yellow->system->get("coreExtensionLocation");
            $output = "<script type=\"text/javascript\" defer=\"defer\" src=\"{$extensionLocation}disqus.js\"></script>\n";
        }
        if ($name=="disqus" || $name=="comments") {
            $output = $this->onParseContentShortcut($page, "disqus", "", "block");
        }
        return $output;
    }
}
