<?php
// Draft plugin, https://github.com/datenstrom/yellow-plugins/tree/master/draft
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowDraft
{
	const VERSION = "0.6.1";
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
			$this->yellow->page->error($this->yellow->config->get("draftStatusCode"), "Page has 'draft' status!");
		}
	}
}

$yellow->plugins->register("draft", "YellowDraft", YellowDraft::VERSION);
?>