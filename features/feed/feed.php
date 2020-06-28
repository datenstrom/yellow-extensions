<?php
// Feed extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/feed
// Copyright (c) 2013-2020 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowFeed {
    const VERSION = "0.8.8";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("feedLocation", "/feed/");
        $this->yellow->system->setDefault("feedFileXml", "feed.xml");
        $this->yellow->system->setDefault("feedFilterLayout", "");
        $this->yellow->system->setDefault("feedPaginationLimit", "30");
    }

    // Handle page layout
    public function onParsePageLayout($page, $name) {
        if ($name=="feed") {
            $pages = $this->yellow->content->index(false, false);
            $pagesFilter = array();
            if ($page->isRequest("tag")) {
                $pages->filter("tag", $page->getRequest("tag"));
                array_push($pagesFilter, $pages->getFilter());
            }
            if ($page->isRequest("author")) {
                $pages->filter("author", $page->getRequest("author"));
                array_push($pagesFilter, $pages->getFilter());
            }
            $feedFilterLayout = $this->yellow->system->get("feedFilterLayout");
            if (!empty($feedFilterLayout)) $pages->filter("layout", $feedFilterLayout);
            $chronologicalOrder = ($this->yellow->system->get("feedFilterLayout")!="blog");
            if ($this->isRequestXml($page)) {
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
                foreach ($pages as $pageFeed) {
                    $timestamp = strtotime($pageFeed->get($chronologicalOrder ? "modified" : "published"));
                    $content = $this->yellow->toolbox->createTextDescription($pageFeed->getContent(), 0, false, "<!--more-->", "<a href=\"".$pageFeed->getUrl()."\">".$this->yellow->text->getHtml("blogMore")."</a>");
                    $output .= "<item>\r\n";
                    $output .= "<title>".$pageFeed->getHtml("title")."</title>\r\n";
                    $output .= "<link>".$pageFeed->getUrl()."</link>\r\n";
                    $output .= "<pubDate>".date(DATE_RSS, $timestamp)."</pubDate>\r\n";
                    $output .= "<guid isPermaLink=\"false\">".$pageFeed->getUrl()."?".$timestamp."</guid>\r\n";
                    $output .= "<dc:creator>".$pageFeed->getHtml("author")."</dc:creator>\r\n";
                    $output .= "<description>".$pageFeed->getHtml("description")."</description>\r\n";
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
                    $text = implode(" ", $pagesFilter);
                    $this->yellow->page->set("titleHeader", $text." - ".$this->yellow->page->get("sitename"));
                    $this->yellow->page->set("titleContent", $this->yellow->page->get("title").": ".$text);
                    $this->yellow->page->set("title", $this->yellow->page->get("title").": ".$text);
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
            $locationFeed = $this->yellow->system->get("coreServerBase").$this->yellow->system->get("feedLocation");
            $locationFeed .= $this->yellow->toolbox->normaliseArguments("page:".$this->yellow->system->get("feedFileXml"), false);
            $output = "<link rel=\"alternate\" type=\"application/rss+xml\" href=\"$locationFeed\" />\n";
        }
        return $output;
    }

    // Check if XML requested
    public function isRequestXml($page) {
        return $page->getRequest("page")==$this->yellow->system->get("feedFileXml");
    }
}
