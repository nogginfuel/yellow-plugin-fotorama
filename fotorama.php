<?php
// Copyright (c) 2015 Jef Lippiatt, http://nogginfuel.com and Mark Seuffert, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.
// Fotorama plugin
class YellowFotorama
{
	const Version = "0.1.1";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		$this->yellow->config->setDefault("fotoramaPluginCdn", "https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/");
		$this->yellow->config->setDefault("fotoramaStyle", "fotorama");
	}
	
	// Handle page content parsing of custom block
	function onParseContentBlock($page, $name, $text, $shortcut)
	{
		$output = NULL;
		if($name=="fotorama" && $shortcut)
		{
			list($pattern, $style, $nav) = $this->yellow->toolbox->getTextArgs($text);
			if(empty($style)) $style = $this->yellow->config->get("fotoramaStyle");
			if(empty($nav)) $nav = "dots";
			$files = empty($pattern) ? $page->getFiles(true) : $this->yellow->files->index(true, true)->match("#$pattern#");
			if(count($files))
			{
				$page->setLastModified($files->getModified());
				$output = "<div class=\"".htmlspecialchars($style)."\" data-nav=\"".htmlspecialchars($nav)."\">\n";
				foreach($files as $file)
				{
					$output .= "<img src=\"".htmlspecialchars($file->getLocation())."\" />\n";
				}
				$output .= "</div>";
			} else {
				$page->error(500, "Fotorama '$pattern' does not exist!");
			}
		}
		return $output;
	}
	
	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = NULL;
		if($name == "footer")
		{
			$pluginCdn = $this->yellow->config->get("fotoramaPluginCdn");
			$output = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$pluginCdn}fotorama.css\" />\n";
			$output .= "<script type=\"text/javascript\" src=\"{$pluginCdn}fotorama.js\"></script>\n";
		}
		return $output;
	}
}
$yellow->plugins->register("fotorama", "YellowFotorama", YellowFotorama::Version);
?>