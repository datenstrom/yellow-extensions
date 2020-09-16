<?php
// 网易云音乐插件，基于Soundcloud扩展修改

class YellowWymusic {
    const VERSION = "0.8.4";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("wymusicStyle", "wymusic");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="wymusic" && ($type=="block" || $type=="inline")) {
            list($id, $style, $autop, $width, $height) = $this->yellow->toolbox->getTextArguments($text);
            if (empty($style)) $style = $this->yellow->system->get("wymusicStyle");
	    if (empty($autop)) $autop = "0";
            if (empty($width)) $width = "310";
            if (empty($height)) $height = "66";
            $output = "<div class=\"".htmlspecialchars($style)."\">";
            $output .= "<iframe  marginwidth=\"0\" marginheight=\"0\" src=\"//music.163.com/outchain/player?type=2&id=".rawurlencode($id)."&auto=".htmlspecialchars($autop)."&height=".htmlspecialchars($height)."\" frameborder=\"no\" border=\"0\"";
            $output .= " width=\"".htmlspecialchars($width += 20)."\" height=\"".htmlspecialchars($height += 20)."\"";
            $output .= "></iframe></div>";
        }
        return $output;
    }
}
