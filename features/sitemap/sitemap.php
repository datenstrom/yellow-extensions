<?php
// Sitemap extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/sitemap
// Copyright (c) 2013-2019 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowSitemap {
    const VERSION = "0.8.2";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("sitemapLocation", "/sitemap/");
        $this->yellow->system->setDefault("sitemapFileXml", "sitemap.xml");
        $this->yellow->system->setDefault("sitemapPaginationLimit", "30");
    }

    // Handle page layout
    public function onParsePageLayout($page, $name) {
        if ($name=="sitemap") {
            $pages = $this->yellow->content->index(false, false);
            if ($this->isRequestXml()) {
                $this->yellow->page->setLastModified($pages->getModified());
                $this->yellow->page->setHeader("Content-Type", "text/xml; charset=utf-8");
                $output = "<?xml version=\"1.0\" encoding=\"utf-8\"\077>\r\n";
                $output .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\r\n";
                foreach ($pages as $page) {
                    $output .= "<url><loc>".$page->getUrl()."</loc></url>\r\n";
                }
                $output .= "</urlset>\r\n";
                $this->yellow->page->setOutput($output);
            } else {
                $pages->sort("title", false);
                $pages->pagination($this->yellow->system->get("sitemapPaginationLimit"));
                if (!$pages->getPaginationNumber()) $this->yellow->page->error(404);
                $this->yellow->page->setPages($pages);
                $this->yellow->page->setLastModified($pages->getModified());
            }
        }
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header") {
            $pagination = $this->yellow->system->get("contentPagination");
            $locationSitemap = $this->yellow->system->get("serverBase").$this->yellow->system->get("sitemapLocation");
            $locationSitemap .= $this->yellow->toolbox->normaliseArgs("$pagination:".$this->yellow->system->get("sitemapFileXml"), false);
            $output = "<link rel=\"sitemap\" type=\"text/xml\" href=\"$locationSitemap\" />\n";
        }
        return $output;
    }
    
    // Check if XML requested
    public function isRequestXml() {
        $pagination = $this->yellow->system->get("contentPagination");
        return $_REQUEST[$pagination]==$this->yellow->system->get("sitemapFileXml");
    }
}
