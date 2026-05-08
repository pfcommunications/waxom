<?php

/**
 * Theme Admin Dynamic Stylesheet
 *
 * @package North
 * @since 1.0
 *
 */
 
header("Content-type: text/css;");

require_once('../../../../../../../wp-load.php');

global $waxom_options;

if(is_array($waxom_options)) {


echo '.wpb-select.accent { background-color: '.$waxom_options['accent_color'].' !important; color:#fff !important; }';
echo '.wpb-select.accent2 { background-color: '.$waxom_options['accent_color2'].' !important; color:#fff !important; }';
echo '.wpb-select.accent3 { background-color: '.$waxom_options['accent_color3'].' !important; color:#fff !important; }';
echo '.wpb-select.accent4 { background-color: '.$waxom_options['accent_color4'].' !important; }';


} // End Main If


?>