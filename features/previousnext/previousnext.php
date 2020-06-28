<?php
// Previousnext extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/previousnext
// Copyright (c) 2013-2020 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowPreviousnext {
    const VERSION = "0.8.6";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("previousnextPagePrevious", "1");
        $this->yellow->system->setDefault("previousnextPageNext", "1");
        $this->yellow->system->setDefault("previousnextStyle", "entry-links");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="previousnext" && ($type=="block" || $type=="inline")) {
            $style = $this->yellow->system->get("previousnextStyle");
            $pages = $this->getRelatedPages($page);
            $page->setLastModified($pages->getModified());
            if ($this->yellow->system->get("previousnextPagePrevious")) $pagePrevious = $pages->getPagePrevious($page);
            if ($this->yellow->system->get("previousnextPageNext")) $pageNext = $pages->getPageNext($page);
            if ($pagePrevious || $pageNext) {
                $output = "<div class=\"".htmlspecialchars($style)."\">\n";
                $output .= "<p>";
                if ($pagePrevious) {
                    $text = preg_replace("/@title/i", $pagePrevious->get("title"), $this->yellow->text->get("PreviousnextPagePrevious"));
                    $output .= "<a class=\"previous\" href=\"".$pagePrevious->getLocation(true)."\">".htmlspecialchars($text)."</a>";
                }
                if ($pageNext) {
                    if ($pagePrevious) $output .= " ";
                    $text = preg_replace("/@title/i", $pageNext->get("title"), $this->yellow->text->get("PreviousnextPageNext"));
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
        $output = null;
        if ($name=="previousnext" || $name=="links") {
            $output = $this->onParseContentShortcut($page, "previousnext", "", "block");
        }
        return $output;
    }
    
    // Return related pages
    public function getRelatedPages($page) {
        switch ($page->get("layout")) {
            case "blog":        $blogLocation = $this->yellow->system->get("blogLocation");
                                if (!empty($blogLocation)) {
                                    $blog = $this->yellow->content->find($blogLocation);
                                    $pages = $this->yellow->content->index(!$blog->isVisible());
                                } else {
                                    $blog = $page->getParent();
                                    $pages = $blog->getChildren(!$blog->isVisible());
                                }
                                $pages->filter("layout", "blog")->sort("published", true);
                                break;
            case "blogpages":   $pages = $this->yellow->content->clean(); break;
            default:            $pages = $page->getSiblings(!$page->isVisible());
        }
        return $pages;
    }
}
