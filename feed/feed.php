<?php
// Copyright (c) 2013-2016 Datenstrom, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.

// Feed plugin
class YellowFeed
{
	const VERSION = "0.6.5";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		$this->yellow->config->setDefault("feedPaginationLimit", "30");
		$this->yellow->config->setDefault("feedLocation", "/feed/");
		$this->yellow->config->setDefault("feedFileXml", "feed.xml");
		$this->yellow->config->setDefault("feedFilter", "");
	}

	// Handle page parsing
	function onParsePage()
	{
		if($this->yellow->page->get("template")=="feed")
		{
			$feedFilter = $this->yellow->config->get("feedFilter");
			$chronologicalOrder = ($this->yellow->config->get("feedFilter")!="blog");
			$pagination = $this->yellow->config->get("contentPagination");
			if($_REQUEST[$pagination]==$this->yellow->config->get("feedFileXml"))
			{
				$pages = $this->yellow->pages->index(false, false);
				if(!empty($feedFilter)) $pages->filter("template", $feedFilter);
				$pages->sort($chronologicalOrder ? "modified" : "published", false);
				$pages->limit($this->yellow->config->get("feedPaginationLimit"));
				$this->yellow->page->setLastModified($pages->getModified());
				$this->yellow->page->setHeader("Content-Type", "application/rss+xml; charset=utf-8");
				$output = "<?xml version=\"1.0\" encoding=\"utf-8\"\077>\r\n";
				$output .= "<rss version=\"2.0\" xmlns:content=\"http://purl.org/rss/1.0/modules/content/\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\">\r\n";
				$output .= "<channel>\r\n";
				$output .= "<title>".$this->yellow->page->getHtml("titleHeader")."</title>\r\n";
				$output .= "<description>".$this->yellow->page->getHtml("description")."</description>\r\n";
				$output .= "<link>".$this->yellow->page->getUrl()."</link>\r\n";
				$output .= "<language>".$this->yellow->page->getHtml("language")."</language>\r\n";
				foreach($pages as $page)
				{
					$timestamp = strtotime($page->get($chronologicalOrder ? "modified" : "published"));
					$content = $this->yellow->toolbox->createTextDescription($page->getContent(), strlenu($page->getContent()), false, "<!--more-->");
					$output .= "<item>\r\n";
					$output .= "<title>".$page->getHtml("title")."</title>\r\n";
					$output .= "<link>".$page->getUrl()."</link>\r\n";
					$output .= "<pubDate>".date(DATE_RSS, $timestamp)."</pubDate>\r\n";
					$output .= "<guid isPermaLink=\"false\">".$page->getUrl()."?".$timestamp."</guid>\r\n";
					$output .= "<dc:creator>".$page->getHtml("author")."</dc:creator>\r\n";
					$output .= "<description>".$page->getHtml("description")."</description>\r\n";
					$output .= "<content:encoded><![CDATA[".$content."]]></content:encoded>\r\n";
					$output .= "</item>\r\n";
				}
				$output .= "</channel>\r\n";
				$output .= "</rss>\r\n";
				$this->yellow->page->setOutput($output);
			} else {
				$pages = $this->yellow->pages->index(false, false);
				if(!empty($feedFilter)) $pages->filter("template", $feedFilter);
				$pages->sort($chronologicalOrder ? "modified" : "published");
				$pages->pagination($this->yellow->config->get("feedPaginationLimit"));
				if(!$pages->getPaginationNumber()) $this->yellow->page->error(404);
				$this->yellow->page->set("feedChronologicalOrder", $chronologicalOrder);
				$this->yellow->page->setPages($pages);
				$this->yellow->page->setLastModified($pages->getModified());
			}
		}
	}
	
	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = NULL;
		if($name=="header")
		{
			$pagination = $this->yellow->config->get("contentPagination");			
			$locationFeed = $this->yellow->config->get("serverBase").$this->yellow->config->get("feedLocation");
			$locationFeed .= $this->yellow->toolbox->normaliseArgs("$pagination:".$this->yellow->config->get("feedFileXml"), false);
			$output = "<link rel=\"alternate\" type=\"application/rss+xml\" href=\"$locationFeed\" />\n";
		}
		return $output;
	}
}

$yellow->plugins->register("feed", "YellowFeed", YellowFeed::VERSION);
?>
