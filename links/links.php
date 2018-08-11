<?php
// Links plugin, https://github.com/datenstrom/yellow-plugins/tree/master/links
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowLinks {
    const VERSION = "0.7.1";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->config->setDefault("linksPagePrevious", "0");
        $this->yellow->config->setDefault("linksPageNext", "1");
        $this->yellow->config->setDefault("linksStyle", "entry-links");
    }
    
    // Handle page content parsing of custom block
    public function onParseContentBlock($page, $name, $text, $shortcut) {
        $output = null;
        if ($name=="links" && $shortcut) {
            $style = $this->yellow->config->get("linksStyle");
            $pages = $this->getLinkPages($page);
            $page->setLastModified($pages->getModified());
            if ($this->yellow->config->get("linksPagePrevious")) $pagePrevious = $pages->getPagePrevious($page);
            if ($this->yellow->config->get("linksPageNext")) $pageNext = $pages->getPageNext($page);
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
    
    // Handle page extra HTML data
    public function onExtra($name) {
        return $this->onParseContentBlock($this->yellow->page, $name, "", true);
    }
    
    // Return link pages
    public function getLinkPages($page) {
        switch ($page->get("template")) {
            case "blog":        $blogLocation = $this->yellow->config->get("blogLocation");
                                if (!empty($blogLocation)) {
                                    $pages = $this->yellow->pages->index(!$page->isVisible());
                                } else {
                                    $pages = $page->getSiblings(!$page->isVisible());
                                }
                                $pages->filter("template", "blog")->sort("published", true);
                                break;
            case "blogpages":   $pages = $this->yellow->pages->clean(); break;
            case "wiki":        $wikiLocation = $this->yellow->config->get("wikiLocation");
                                if (!empty($wikiLocation)) {
                                    $pages = $this->yellow->pages->index(!$page->isVisible());
                                } else {
                                    $pages = $page->getSiblings(!$page->isVisible());
                                }
                                $pages->filter("template", "wiki")->sort("title", true);
                                break;
            case "wikipages":   $pages = $this->yellow->pages->clean(); break;
            default:            $pages = $page->getSiblings(!$page->isVisible());
        }
        return $pages;
    }
}

$yellow->plugins->register("links", "YellowLinks", YellowLinks::VERSION);
