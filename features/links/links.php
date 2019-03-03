<?php
// Links extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/links
// Copyright (c) 2013-2019 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowLinks {
    const VERSION = "0.8.2";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("linksPagePrevious", "0");
        $this->yellow->system->setDefault("linksPageNext", "1");
        $this->yellow->system->setDefault("linksStyle", "entry-links");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="links" && ($type=="block" || $type=="inline")) {
            $style = $this->yellow->system->get("linksStyle");
            $pages = $this->getLinkPages($page);
            $page->setLastModified($pages->getModified());
            if ($this->yellow->system->get("linksPagePrevious")) $pagePrevious = $pages->getPagePrevious($page);
            if ($this->yellow->system->get("linksPageNext")) $pageNext = $pages->getPageNext($page);
            if ($pagePrevious || $pageNext) {
                $output = "<div class=\"".htmlspecialchars($style)."\">\n";
                $output .= "<p>";
                if ($pagePrevious) {
                    $text = preg_replace("/@title/i", $pagePrevious->get("title"), $this->yellow->text->get("pagePrevious"));
                    $output .= "<a class=\"previous\" href=\"".$pagePrevious->getLocation(true)."\">".htmlspecialchars($text)."</a>";
                }
                if ($pageNext) {
                    if ($pagePrevious) $output .= " ";
                    $text = preg_replace("/@title/i", $pageNext->get("title"), $this->yellow->text->get("pageNext"));
                    $output .= "<a class=\"next\" href=\"".$pageNext->getLocation(true)."\">".htmlspecialchars($text)."</a>";
                }
                $output .= "<p>\n";
                $output .="</div>\n";
            }
        }
        return $output;
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        return $this->onParseContentShortcut($page, $name, "", "block");
    }
    
    // Return link pages
    public function getLinkPages($page) {
        switch ($page->get("layout")) {
            case "blog":        $blogLocation = $this->yellow->system->get("blogLocation");
                                if (!empty($blogLocation)) {
                                    $pages = $this->yellow->content->index(!$page->isVisible());
                                } else {
                                    $pages = $page->getSiblings(!$page->isVisible());
                                }
                                $pages->filter("layout", "blog")->sort("published", true);
                                break;
            case "blogpages":   $pages = $this->yellow->content->clean(); break;
            case "wiki":        $wikiLocation = $this->yellow->system->get("wikiLocation");
                                if (!empty($wikiLocation)) {
                                    $pages = $this->yellow->content->index(!$page->isVisible());
                                } else {
                                    $pages = $page->getSiblings(!$page->isVisible());
                                }
                                $pages->filter("layout", "wiki")->sort("title", true);
                                break;
            case "wikipages":   $pages = $this->yellow->content->clean(); break;
            default:            $pages = $page->getSiblings(!$page->isVisible());
        }
        return $pages;
    }
}
