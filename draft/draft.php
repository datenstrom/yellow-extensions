<?php
// Draft plugin, https://github.com/datenstrom/yellow-plugins/tree/master/draft
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowDraft
{
	const VERSION = "0.7.1";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		$this->yellow->config->setDefault("draftStatusCode", "500");
	}
	
	// Handle page meta data parsing
	function onParseMeta($page)
	{
		if($page->get("status")=="draft") $page->visible = false;
	}
	
	// Handle page parsing
	function onParsePage()
	{
		if($this->yellow->page->get("status")=="draft" && $this->yellow->getRequestHandler()=="core")
		{
			$pageError = "Can't show draft page!";
			if($this->yellow->plugins->isExisting("edit"))
			{
				$pageError .= " <a href=\"".$this->yellow->page->get("pageEdit")."\">Please log in</a>.";
			}
			$this->yellow->page->error($this->yellow->config->get("draftStatusCode"), $pageError);
		}
	}
}

$yellow->plugins->register("draft", "YellowDraft", YellowDraft::VERSION);
?>
