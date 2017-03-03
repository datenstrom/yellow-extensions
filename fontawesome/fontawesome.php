<?php
// Fontawesome plugin, https://github.com/datenstrom/yellow-plugins/tree/master/fontawesome
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowFontawesome
{
	const VERSION = "0.6.3";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
	}
	
	// Handle page content parsing of custom block
	function onParseContentBlock($page, $name, $text, $shortcut)
	{
		$output = null;
		if($name=="fa" && $shortcut)
		{
			list($shortname, $style) = $this->yellow->toolbox->getTextArgs($text);
			if(preg_match("/fa-(.+)/", $shortname, $matches)) $shortname = $matches[1];
			$class = trim("fa fa-$shortname $style");
			$output = "<i class=\"".htmlspecialchars($class)."\"></i>";
		}
		return $output;
	}
	
	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = null;
		if($name=="header")
		{
			$locationStylesheet = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation")."fontawesome.css";
			$fileNameStylesheet = $this->yellow->config->get("pluginDir")."fontawesome.css";
			if(is_file($fileNameStylesheet)) $output = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"$locationStylesheet\" />\n";
		}
		return $output;
	}
}

$yellow->plugins->register("fontawesome", "YellowFontawesome", YellowFontawesome::VERSION);
?>