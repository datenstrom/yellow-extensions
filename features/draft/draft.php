<?php
// Draft extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/draft
// Copyright (c) 2013-2020 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowDraft {
    const VERSION = "0.8.4";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("draftPaginationLimit", "30");
    }
    
    // Handle page meta data
    public function onParseMeta($page) {
        if ($page->get("status")=="draft") $page->visible = false;
    }
    
    // Handle page layout
    public function onParsePageLayout($page, $name) {
        if ($this->yellow->page->get("status")=="draft" && $this->yellow->getRequestHandler()=="core") {
            $pageError = "Can't show draft page!";
            if ($this->yellow->extensions->isExisting("edit")) {
                $pageError .= " <a href=\"".$this->yellow->page->get("pageEdit")."\">Please log in</a>.";
            }
            $this->yellow->page->error(500, $pageError);
        }
        if ($name=="draftpages") {
            $pages = $this->yellow->content->index(true, false)->filter("status", "draft");
            $pages->diff($this->yellow->content->index(true, false)->filter("layout", "draftpages"));
            $pages->sort("title", false);
            $pages->pagination($this->yellow->system->get("draftPaginationLimit"));
            if ($page->isRequest("page") && !$pages->getPaginationNumber()) $this->yellow->page->error(404);
            $this->yellow->page->setPages($pages);
            $this->yellow->page->setLastModified($pages->getModified());
            $this->yellow->page->setHeader("Cache-Control", "max-age=60");
            $this->yellow->page->set("status", count($pages) ? "done" : "empty");
        }
    }
}
