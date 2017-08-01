<?php
// Twitter Plugin
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowTwitter
{
	const VERSION = "0.0.2";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		$this->yellow->config->setDefault("twitterDNT", true); // Opt-out from twitter tracking
		$this->yellow->config->setDefault("twitterJsurl", "//platform.twitter.com/widgets.js");
	}
	
	// Handle page content parsing of custom block
	function onParseContentBlock($page, $name, $text, $shortcut)
	{
		$output = null;
		
		$twitterjs = $this->yellow->config->get("twitterJsurl");
		
		if($name=="twitter" && $shortcut)
		{
			list($id, $width, $height, $theme) = $this->yellow->toolbox->getTextArgs($text);
			$output = "<div class=\"twitter\">\n";
			$output .= "<a class=\"twitter-timeline\"";
			if($width && $height) $output .=" data-width=".htmlspecialchars($width)."\" data-height=".htmlspecialchars($height)."\"";
			if($theme) $output .=" data-theme=".htmlspecialchars($theme)."\"";
			$output .= " href=\"https://twitter.com/".rawurlencode($id)."\">Tweets by ".htmlspecialchars($id)."</a>";
			$output .="<script async src=\"".$twitterjs."\" charset=\"utf-8\"></script>\n";
			$output .= "</div>\n";
		}
		if($name=="twitterfollow" && $shortcut)
		{
			list($id) = $this->yellow->toolbox->getTextArgs($text);
			$output = "<div class=\"twitterfollow\">\n";
			$output .= "<a href=\"https://twitter.com/".rawurlencode($id)."\" class=\"twitter-follow-button\">Follow @".htmlspecialchars($id)."</a>";
			$output .="<script async src=\"".$twitterjs."\" charset=\"utf-8\"></script>\n";
			$output .= "</div>\n";
		}
		return $output;
	}
	
	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = null;
		if($name=="header")
		{
			if($this->yellow->config->get("twitterDNT") == true) $output = "<meta name=\"twitter:dnt\" content=\"on\">\n";
		}
		return $output;
	}
}

$yellow->plugins->register("twitter", "YellowTwitter", YellowTwitter::VERSION);
?>
