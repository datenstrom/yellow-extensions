<?php
// Sitemap plugin, https://github.com/datenstrom/yellow-plugins/tree/master/sitemap
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowSitemap
{
	const VERSION = "0.7.1";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		$this->yellow->config->setDefault("sitemapLocation", "/sitemap/");
		$this->yellow->config->setDefault("sitemapFileXml", "sitemap.xml");
		$this->yellow->config->setDefault("sitemapPaginationLimit", "30");
	}

	// Handle page parsing
	function onParsePage()
	{
		if($this->yellow->page->get("template")=="sitemap")
		{
			$pagination = $this->yellow->config->get("contentPagination");
			if($_REQUEST[$pagination]==$this->yellow->config->get("sitemapFileXml"))
			{
				$pages = $this->yellow->pages->index(false, false);
				$this->yellow->page->setLastModified($pages->getModified());
				$this->yellow->page->setHeader("Content-Type", "text/xml; charset=utf-8");
				$output = "<?xml version=\"1.0\" encoding=\"utf-8\"\077>\r\n";
				$output .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\r\n";
				foreach($pages as $page) $output .= "<url><loc>".$page->getUrl()."</loc></url>\r\n";
				$output .= "</urlset>\r\n";
				$this->yellow->page->setOutput($output);
			} else {
				$pages = $this->yellow->pages->index(false, false);
				$pages->sort("title", false);
				$pages->pagination($this->yellow->config->get("sitemapPaginationLimit"));
				if(!$pages->getPaginationNumber()) $this->yellow->page->error(404);
				$this->yellow->page->setPages($pages);
				$this->yellow->page->setLastModified($pages->getModified());
			}
		}
	}
	
	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = null;
		if($name=="header")
		{
			$pagination = $this->yellow->config->get("contentPagination");
			$locationSitemap = $this->yellow->config->get("serverBase").$this->yellow->config->get("sitemapLocation");
			$locationSitemap .= $this->yellow->toolbox->normaliseArgs("$pagination:".$this->yellow->config->get("sitemapFileXml"), false);
			$output = "<link rel=\"sitemap\" type=\"text/xml\" href=\"$locationSitemap\" />\n";
		}
		return $output;
	}
}

$yellow->plugins->register("sitemap", "YellowSitemap", YellowSitemap::VERSION);
?>
