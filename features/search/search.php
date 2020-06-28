<?php
// Search extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/search
// Copyright (c) 2013-2020 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowSearch {
    const VERSION = "0.8.6";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("searchLocation", "/search/");
        $this->yellow->system->setDefault("searchPaginationLimit", "5");
        $this->yellow->system->setDefault("searchPageLength", "240");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="search" && ($type=="block" || $type=="inline")) {
            list($location) = $this->yellow->toolbox->getTextArguments($text);
            if (empty($location)) $location = $this->yellow->system->get("searchLocation");
            $output = "<div class=\"".htmlspecialchars($name)."\" role=\"search\">\n";
            $output .= "<form class=\"search-form\" action=\"".$this->yellow->page->base.$location."\" method=\"post\">\n";
            $output .= "<input class=\"form-control\" type=\"text\" name=\"query\" placeholder=\"".$this->yellow->text->getHtml("searchButton")."\" />\n";
            $output .= "<input type=\"hidden\" name=\"clean-url\" />\n";
            $output .= "</form>\n";
            $output .= "</div>\n";
        }
        return $output;
    }
    
    // Handle page layout
    public function onParsePageLayout($page, $name) {
        if ($name=="search") {
            $query = trim($page->getRequest("query"));
            list($tokens, $filters) = $this->getSearchInformation($query, 10);
            if (!empty($tokens) || !empty($filters)) {
                $pages = $this->yellow->content->clean();
                $showInvisible = $this->yellow->getRequestHandler()=="edit" &&
                    ($filters["status"]=="private" || $filters["status"]=="draft" || $filters["status"]=="unlisted");
                foreach ($this->yellow->content->index($showInvisible, false) as $pageSearch) {
                    $searchScore = 0;
                    $searchTokens = array();
                    foreach ($tokens as $token) {
                        $score = substr_count(strtoloweru($pageSearch->getContent(true)), strtoloweru($token));
                        if ($score) {
                            $searchScore += $score;
                            $searchTokens[$token] = true;
                        }
                        if (stristr($pageSearch->getLocation(true), $token)) {
                            $searchScore += 20;
                            $searchTokens[$token] = true;
                        }
                        if (stristr($pageSearch->get("title"), $token)) {
                            $searchScore += 10;
                            $searchTokens[$token] = true;
                        }
                        if (stristr($pageSearch->get("tag"), $token)) {
                            $searchScore += 5;
                            $searchTokens[$token] = true;
                        }
                        if (stristr($pageSearch->get("author"), $token)) {
                            $searchScore += 2;
                            $searchTokens[$token] = true;
                        }
                    }
                    if (count($tokens)==count($searchTokens)) {
                        $pageSearch->set("searchscore", $searchScore);
                        $pages->append($pageSearch);
                    }
                }
                if (!empty($filters)) {
                    if (isset($filters["tag"])) $pages->filter("tag", $filters["tag"]);
                    if (isset($filters["author"])) $pages->filter("author", $filters["author"]);
                    if (isset($filters["language"])) $pages->filter("language", $filters["language"]);
                    if (isset($filters["status"])) $pages->filter("status", $filters["status"]);
                }
                $pages->sort("modified")->sort("searchscore");
                $pages->pagination($this->yellow->system->get("searchPaginationLimit"));
                if ($page->isRequest("page") && !$pages->getPaginationNumber()) $this->yellow->page->error(404);
                $text = empty($query) ? $this->yellow->text->get("searchSpecialChanges") : $query;
                $this->yellow->page->set("titleHeader", $text." - ".$this->yellow->page->get("sitename"));
                $this->yellow->page->set("titleContent", $this->yellow->page->get("title").": ".$text);
                $this->yellow->page->set("title", $this->yellow->page->get("title").": ".$text);
                $this->yellow->page->setPages($pages);
                $this->yellow->page->setLastModified($pages->getModified());
                $this->yellow->page->setHeader("Cache-Control", "max-age=60");
                $this->yellow->page->set("status", count($pages) ? "done" : "empty");
            } else {
                if ($this->yellow->isCommandLine()) $this->yellow->page->error(500, "Static website not supported!");
                $this->yellow->page->set("status", "none");
            }
        }
    }
        
    // Return search information
    public function getSearchInformation($query, $tokensMax) {
        $tokens = array_unique(array_filter($this->yellow->toolbox->getTextArguments($query), "strlen"));
        $filters = array();
        $filtersSupported = array("tag", "author", "language", "status", "special");
        foreach ($_REQUEST as $key=>$value) {
            if (in_array($key, $filtersSupported)) $filters[$key] = $value;
        }
        foreach ($tokens as $key=>$value) {
            if (preg_match("/^(.*?):(.*)$/", $value, $matches)) {
                if (!empty($matches[1]) && !strempty($matches[2]) && in_array($matches[1], $filtersSupported)) {
                    $filters[$matches[1]] = $matches[2];
                    unset($tokens[$key]);
                }
            }
        }
        if ($tokensMax) $tokens = array_slice($tokens, 0, $tokensMax);
        return array($tokens, $filters);
    }
}
