<?php
// Draft extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/draft
// Copyright (c) 2013-2019 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowDraft {
    const VERSION = "0.8.2";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("draftStatusCode", "500");
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
            $this->yellow->page->error($this->yellow->system->get("draftStatusCode"), $pageError);
        }
    }
}
