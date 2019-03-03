<?php
// Feed extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/feed
// Copyright (c) 2013-2019 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowFeed {
    const VERSION = "0.8.2";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("feedLocation", "/feed/");
        $this->yellow->system->setDefault("feedFileXml", "feed.xml");
        $this->yellow->system->setDefault("feedFilter", "");
        $this->yellow->system->setDefault("feedPaginationLimit", "30");
    }

    // Handle page layout
    public function onParsePageLayout($page, $name) {
        if ($name=="feed") {
            $pages = $this->yellow->content->index(false, false);
            $pagesFilter = array();
            if ($_REQUEST["tag"]) {
                $pages->filter("tag", $_REQUEST["tag"]);
                array_push($pagesFilter, $pages->getFilter());
            }
            if ($_REQUEST["author"]) {
                $pages->filter("author", $_REQUEST["author"]);
                array_push($pagesFilter, $pages->getFilter());
            }
            $feedFilter = $this->yellow->system->get("feedFilter");
            if (!empty($feedFilter)) $pages->filter("layout", $feedFilter);
            $chronologicalOrder = ($this->yellow->system->get("feedFilter")!="blog");
            if ($this->isRequestXml()) {
                $pages->sort($chronologicalOrder ? "modified" : "published", false);
                $pages->limit($this->yellow->system->get("feedPaginationLimit"));
                $title = !empty($pagesFilter) ? implode(" ", $pagesFilter)." - ".$this->yellow->page->get("sitename") : $this->yellow->page->get("sitename");
                $this->yellow->page->setLastModified($pages->getModified());
                $this->yellow->page->setHeader("Content-Type", "application/rss+xml; charset=utf-8");
                $output = "<?xml version=\"1.0\" encoding=\"utf-8\"\077>\r\n";
                $output .= "<rss version=\"2.0\" xmlns:content=\"http://purl.org/rss/1.0/modules/content/\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\">\r\n";
                $output .= "<channel>\r\n";
                $output .= "<title>".htmlspecialchars($title)."</title>\r\n";
                $output .= "<link>".$this->yellow->page->scheme."://".$this->yellow->page->address.$this->yellow->page->base."/"."</link>\r\n";
                $output .= "<description>".$this->yellow->page->getHtml("description")."</description>\r\n";
                $output .= "<language>".$this->yellow->page->getHtml("language")."</language>\r\n";
                foreach ($pages as $page) {
                    $timestamp = strtotime($page->get($chronologicalOrder ? "modified" : "published"));
                    $content = $this->yellow->toolbox->createTextDescription($page->getContent(), 0, false, "<!--more-->", " <a href=\"".$page->getUrl()."\">".$this->yellow->text->getHtml("blogMore")."</a>");
                    $output .= "<item>\r\n";
                    $output .= "<title>".$page->getHtml("title")."</title>\r\n";
                    $output .= "<link>".$page->getUrl()."</link>\r\n";
                    $output .= "<pubDate>".date(DATE_RSS, $timestamp)."</pubDate>\r\n";
                    $output .= "<guid isPermaLink=\"false\">".$page->getUrl()."?".$timestamp."</guid>\r\n";
                    $output .= "<dc:creator>".$page->getHtml("author")."</dc:creator>\r\n";
                    $output .= "<description>".$page->getHtml("description")."</description>\r\n";
                    $output .= "<content:encoded><![CDATA[".$content."]]></content:encoded>\r\n";
                    $output .= "</item>\r\n";
                }
                $output .= "</channel>\r\n";
                $output .= "</rss>\r\n";
                $this->yellow->page->setOutput($output);
            } else {
                $pages->sort($chronologicalOrder ? "modified" : "published");
                $pages->pagination($this->yellow->system->get("feedPaginationLimit"));
                if (!$pages->getPaginationNumber()) $this->yellow->page->error(404);
                if (!empty($pagesFilter)) {
                    $title = implode(" ", $pagesFilter);
                    $this->yellow->page->set("titleHeader", $title." - ".$this->yellow->page->get("sitename"));
                    $this->yellow->page->set("titleContent", $this->yellow->page->get("title").": ".$title);
                }
                $this->yellow->page->set("feedChronologicalOrder", $chronologicalOrder);
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
            $locationFeed = $this->yellow->system->get("serverBase").$this->yellow->system->get("feedLocation");
            $locationFeed .= $this->yellow->toolbox->normaliseArgs("$pagination:".$this->yellow->system->get("feedFileXml"), false);
            $output = "<link rel=\"alternate\" type=\"application/rss+xml\" href=\"$locationFeed\" />\n";
        }
        return $output;
    }

    // Check if XML requested
    public function isRequestXml() {
        $pagination = $this->yellow->system->get("contentPagination");
        return $_REQUEST[$pagination]==$this->yellow->system->get("feedFileXml");
    }
}
