<?php
// Links plugin, https://github.com/datenstrom/yellow-plugins/tree/master/links
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowLinks
{
	const VERSION = "0.6.6";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		$this->yellow->config->setDefault("linksPagePrevious", "0");
		$this->yellow->config->setDefault("linksPageNext", "1");
		$this->yellow->config->setDefault("linksStyle", "entry-links");
	}
	
	// Handle page content parsing of custom block
	function onParseContentBlock($page, $name, $text, $shortcut)
	{
		$output = null;
		if($name=="links" && $shortcut)
		{
			$style = $this->yellow->config->get("linksStyle");
			$publicationOrder = ($page->get("template")=="blog");
			$parent = $page->getParent();
			$pages = $parent ? $page->getSiblings(!$parent->isVisible()) : $this->yellow->pages->clean();
			$pages->sort($publicationOrder ? "published" : "title", true);
			$page->setLastModified($pages->getModified());
			if($this->yellow->config->get("linksPagePrevious")) $pagePrevious = $pages->getPagePrevious($page);
			if($this->yellow->config->get("linksPageNext")) $pageNext = $pages->getPageNext($page);
			if($pagePrevious || $pageNext)
			{
				$output = "<div class=\"".htmlspecialchars($style)."\">\n";
				$output .= "<p>";
				if($pagePrevious)
				{
					$text = preg_replace("/@title/i", $pagePrevious->get("title"), $this->yellow->text->get("pagePrevious"));
					$output .= "<a class=\"previous\" href=\"".$pagePrevious->getLocation(true)."\">".htmlspecialchars($text)."</a>";
				}
				if($pageNext)
				{
					if($pagePrevious) $output .= " ";
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
	function onExtra($name)
	{
		return $this->onParseContentBlock($this->yellow->page, $name, "", true);
	}
}

$yellow->plugins->register("links", "YellowLinks", YellowLinks::VERSION);
?>