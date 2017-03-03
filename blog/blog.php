<?php
// Blog plugin, https://github.com/datenstrom/yellow-plugins/tree/master/blog
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowBlog
{
	const VERSION = "0.6.12";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		$this->yellow->config->setDefault("blogLocation", "");
		$this->yellow->config->setDefault("blogPagesMax", "10");
		$this->yellow->config->setDefault("blogPaginationLimit", "5");
	}
	
	// Handle page content parsing of custom block
	function onParseContentBlock($page, $name, $text, $shortcut)
	{
		$output = null;
		if($name=="blogarchive" && $shortcut)
		{
			list($location) = $this->yellow->toolbox->getTextArgs($text);
			if(empty($location)) $location = $this->yellow->config->get("blogLocation");
			$blog = $this->yellow->pages->find($location);
			$pages = $blog ? $blog->getChildren(!$blog->isVisible()) : $this->yellow->pages->clean();
			$pages->filter("template", "blog");
			$page->setLastModified($pages->getModified());
			$months = array();
			foreach($pages as $page) if(preg_match("/^(\d+\-\d+)\-/", $page->get("published"), $matches)) ++$months[$matches[1]];
			if(count($months))
			{
				uksort($months, strnatcasecmp);
				$months = array_reverse($months);
				$output = "<div class=\"".htmlspecialchars($name)."\">\n";
				$output .= "<ul>\n";
				foreach($months as $key=>$value)
				{
					$output .= "<li><a href=\"".$blog->getLocation(true).$this->yellow->toolbox->normaliseArgs("published:$key")."\">";
					$output .= htmlspecialchars($this->yellow->text->normaliseDate($key))."</a></li>\n";
				}
				$output .= "</ul>\n";
				$output .= "</div>\n";
			} else {
				$page->error(500, "Blogarchive '$location' does not exist!");
			}
		}
		if($name=="blogauthors" && $shortcut)
		{
			list($location) = $this->yellow->toolbox->getTextArgs($text);
			if(empty($location)) $location = $this->yellow->config->get("blogLocation");
			$blog = $this->yellow->pages->find($location);
			$pages = $blog ? $blog->getChildren(!$blog->isVisible()) : $this->yellow->pages->clean();
			$pages->filter("template", "blog");
			$page->setLastModified($pages->getModified());
			$authors = array();
			foreach($pages as $page) if($page->isExisting("author")) foreach(preg_split("/\s*,\s*/", $page->get("author")) as $author) ++$authors[$author];
			if(count($authors))
			{
				$authors = $this->yellow->lookup->normaliseUpperLower($authors);
				uksort($authors, strnatcasecmp);
				$output = "<div class=\"".htmlspecialchars($name)."\">\n";
				$output .= "<ul>\n";
				foreach($authors as $key=>$value)
				{
					$output .= "<li><a href=\"".$blog->getLocation(true).$this->yellow->toolbox->normaliseArgs("author:$key")."\">";
					$output .= htmlspecialchars($key)."</a></li>\n";
				}
				$output .= "</ul>\n";
				$output .= "</div>\n";
			} else {
				$page->error(500, "Blogauthors '$location' does not exist!");
			}
		}
		if($name=="blogrecent" && $shortcut)
		{
			list($location, $pagesMax) = $this->yellow->toolbox->getTextArgs($text);
			if(empty($location)) $location = $this->yellow->config->get("blogLocation");
			if(empty($pagesMax)) $pagesMax = $this->yellow->config->get("blogPagesMax");
			$blog = $this->yellow->pages->find($location);
			$pages = $blog ? $blog->getChildren(!$blog->isVisible()) : $this->yellow->pages->clean();
			$pages->filter("template", "blog")->sort("published", false)->limit($pagesMax);
			$page->setLastModified($pages->getModified());
			if(count($pages))
			{
				$output = "<div class=\"".htmlspecialchars($name)."\">\n";
				$output .= "<ul>\n";
				foreach($pages as $page)
				{
					$output .= "<li><a href=\"".$page->getLocation(true)."\">".$page->getHtml("titleNavigation")."</a></li>\n";
				}
				$output .= "</ul>\n";
				$output .= "</div>\n";
			} else {
				$page->error(500, "Blogrecent '$location' does not exist!");
			}
		}
		if($name=="blogrelated" && $shortcut)
		{
			list($location, $pagesMax) = $this->yellow->toolbox->getTextArgs($text);
			if(empty($location)) $location = $this->yellow->config->get("blogLocation");
			if(empty($pagesMax)) $pagesMax = $this->yellow->config->get("blogPagesMax");
			$blog = $this->yellow->pages->find($location);
			$pages = $blog ? $blog->getChildren(!$blog->isVisible()) : $this->yellow->pages->clean();
			$pages->filter("template", "blog")->similar($page->getPage("main"))->limit($pagesMax);
			$page->setLastModified($pages->getModified());
			if(count($pages))
			{
				$output = "<div class=\"".htmlspecialchars($name)."\">\n";
				$output .= "<ul>\n";
				foreach($pages as $page)
				{
					$output .= "<li><a href=\"".$page->getLocation(true)."\">".$page->getHtml("titleNavigation")."</a></li>\n";
				}
				$output .= "</ul>\n";
				$output .= "</div>\n";
			} else {
				$page->error(500, "Blogrelated '$location' does not exist!");
			}
		}
		if($name=="blogtags" && $shortcut)
		{
			list($location, $pagesMax) = $this->yellow->toolbox->getTextArgs($text);
			if(empty($location)) $location = $this->yellow->config->get("blogLocation");
			if(empty($pagesMax)) $pagesMax = 0;
			$blog = $this->yellow->pages->find($location);
			$pages = $blog ? $blog->getChildren(!$blog->isVisible()) : $this->yellow->pages->clean();
			$pages->filter("template", "blog");
			$page->setLastModified($pages->getModified());
			$tags = array();
			foreach($pages as $page) if($page->isExisting("tag")) foreach(preg_split("/\s*,\s*/", $page->get("tag")) as $tag) ++$tags[$tag];
			if(count($tags))
			{
				$tags = $this->yellow->lookup->normaliseUpperLower($tags);
				if($pagesMax!=0 && count($tags)>$pagesMax)
				{
					uasort($tags, strnatcasecmp);
					$tags = array_slice($tags, -$pagesMax);
				}
				uksort($tags, strnatcasecmp);
				$output = "<div class=\"".htmlspecialchars($name)."\">\n";
				$output .= "<ul>\n";
				foreach($tags as $key=>$value)
				{
					$output .= "<li><a href=\"".$blog->getLocation(true).$this->yellow->toolbox->normaliseArgs("tag:$key")."\">";
					$output .= htmlspecialchars($key)."</a></li>\n";
				}
				$output .= "</ul>\n";
				$output .= "</div>\n";
			} else {
				$page->error(500, "Blogtags '$location' does not exist!");
			}
		}
		return $output;
	}
	
	// Handle page parsing
	function onParsePage()
	{
		if($this->yellow->page->get("template")=="blogpages")
		{
			$pages = $this->yellow->page->getChildren(!$this->yellow->page->isVisible());
			$pagesFilter = array();
			if($_REQUEST["tag"])
			{
				$pages->filter("tag", $_REQUEST["tag"]);
				array_push($pagesFilter, $pages->getFilter());
			}
			if($_REQUEST["author"])
			{
				$pages->filter("author", $_REQUEST["author"]);
				array_push($pagesFilter, $pages->getFilter());
			}
			if($_REQUEST["published"])
			{
				$pages->filter("published", $_REQUEST["published"], false);
				array_push($pagesFilter, $this->yellow->text->normaliseDate($pages->getFilter()));
			}
			$pages->sort("published")->filter("template", "blog");
			$pages->pagination($this->yellow->config->get("blogPaginationLimit"));
			if(!$pages->getPaginationNumber()) $this->yellow->page->error(404);
			if(!empty($pagesFilter))
			{
				$title = implode(' ', $pagesFilter);
				$this->yellow->page->set("titleHeader", $title." - ".$this->yellow->page->get("sitename"));
				$this->yellow->page->set("titleBlog", $this->yellow->text->get("blogFilter")." ".$title);
			}
			$this->yellow->page->setPages($pages);
			$this->yellow->page->setLastModified($pages->getModified());
			$this->yellow->page->setHeader("Cache-Control", "max-age=60");
		}
		if($this->yellow->page->get("template")=="blog")
		{
			$location = $this->yellow->config->get("blogLocation");
			if(!empty($location))
			{
				$page = $this->yellow->pages->find($location);
			} else {
				$page = $this->yellow->page;
				if($this->yellow->lookup->isFileLocation($page->location)) $page = $page->getParent();
			}
			$this->yellow->page->setPage("blog", $page);
		}
	}
}

$yellow->plugins->register("blog", "YellowBlog", YellowBlog::VERSION);
?>