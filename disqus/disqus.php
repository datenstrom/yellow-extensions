<?php
// Disqus plugin, https://github.com/datenstrom/yellow-plugins/tree/master/disqus
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowDisqus {
    const VERSION = "0.7.3";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->config->setDefault("disqusShortname", "yellow");
    }
    
    // Handle page content parsing of custom block
    public function onParseContentBlock($page, $name, $text, $shortcut) {
        $output = null;
        if ($name=="disqus" && $shortcut) {
            $shortname = $this->yellow->config->get("disqusShortname");
            $url = $this->yellow->page->get("pageRead");
            $language = $this->yellow->page->get("language");
            $output = "<div id=\"disqus_thread\"></div>\n";
            $output .= "<script type=\"text/javascript\">\n";
            $output .= "var disqus_shortname = '".strencode($shortname)."';\n";
            $output .= "var disqus_url = '".strencode($url)."';\n";
            $output .= "var disqus_config = function () { this.language = '".strencode($language)."'; };\n";
            $output .= "(function() {\n";
            $output .= "var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;\n";
            $output .= "dsq.src = 'https://' + disqus_shortname + '.disqus.com/embed.js';\n";
            $output .= "(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);\n";
            $output .= "})();\n";
            $output .= "</script>\n";
            $output .= "<noscript>Please enable JavaScript to view the <a href=\"https://disqus.com/?ref_noscript\">comments powered by Disqus.</a></noscript>\n";
        }
        return $output;
    }
    
    // Handle page extra HTML data
    public function onExtra($name) {
        $output = null;
        if ($name=="disqus" || $name=="comments") {
            $output = $this->onParseContentBlock($this->yellow->page, "disqus", "", true);
        }
        return $output;
    }
}

$yellow->plugins->register("disqus", "YellowDisqus", YellowDisqus::VERSION);
