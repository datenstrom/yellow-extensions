<?php
// Meta extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/meta
// Copyright (c) 2013-2019 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowMeta {
    const VERSION = "0.8.3";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("metaTwitterUser", "@datenstromse");
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header") {
            
            // Twitter
            if ($this->yellow->system->get("metaTwitterUser")) {
                $output = "<meta name=\"twitter:card\" content=\"summary\" />\n";
                $output .= "<meta name=\"twitter:site\" content=\"".$this->yellow->system->get("metaTwitterUser")."\" />\n";
                if ($this->yellow->page->getHtml("metaTwitterUser")) $output .= "<meta name=\"twitter:creator\" content=\"".$this->yellow->page->getHtml("metaTwitterUser")."\" />\n";
                $output .= "<meta name=\"twitter:title\" content=\"".$this->yellow->page->getHtml("title")."\" />\n";
                $output .= "<meta name=\"twitter:description\" content=\"".$this->yellow->page->getHtml("description")."\" />\n";
                if ($this->yellow->page->getHtml("metaImage")) $output .= "<meta name=\"twitter:image\" content=\"".$this->yellow->page->getHtml("metaImage")."\" />\n";
                if ($this->yellow->page->getHtml("metaImageAlt")) $output .= "<meta name=\"twitter:image:alt\" content=\"".$this->yellow->page->getHtml("metaImageAlt")."\" />\n";
            }
            
            // Open Graph
            $output .= "<meta property=\"og:title\" content=\"".$this->yellow->page->getHtml("title")."\" />\n";
            if ($this->yellow->page->getHtml("layout") == "blog") {
                $output .= "<meta property=\"og:type\" content=\"article\" />\n";
                $output .= "<meta property=\"article:published_time\" content=\"".$this->yellow->page->getDateFormattedHtml("published", DATE_ATOM)."\" />\n";
                $output .= "<meta property=\"article:modified_time\" content=\"".$this->yellow->page->getDateFormattedHtml("modified", DATE_ATOM)."\" />\n";
                $output .= "<meta property=\"og:updated_time\" content=\"".$this->yellow->page->getDateFormattedHtml("modified", DATE_ATOM)."\" />\n";
                if ($this->yellow->page->getHtml("tag")) $output .= "<meta property=\"article:tag\" content=\"".$this->yellow->page->getHtml("tag")."\" />\n";
            } else {
                $output .= "<meta property=\"og:type\" content=\"website\" />\n";
            }
            $output .= "<meta property=\"og:url\" content=\"".$this->yellow->page->getUrl()."\" />\n";
            $output .= "<meta property=\"og:description\" content=\"".$this->yellow->page->getHtml("description")."\" />\n";
            if ($this->yellow->page->getHtml("metaImage")) $output .= "<meta property=\"og:image\" content=\"".$this->yellow->page->getHtml("metaImage")."\" />\n";
            if ($this->yellow->page->getHtml("metaImageAlt")) $output .= "<meta property=\"og:image:alt\" content=\"".$this->yellow->page->getHtml("metaImageAlt")."\" />\n";
            $output .= "<meta property=\"og:site_name\" content=\"".$this->yellow->system->get("sitename")."\" />\n";
        }
        return $output;
    }
}
