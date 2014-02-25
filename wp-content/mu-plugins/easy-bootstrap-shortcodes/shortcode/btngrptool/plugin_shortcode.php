<?php

function osc_theme_btngrptoolbar($params, $content = null) {
	extract(shortcode_atts(array(
				'style' => '',
                                 // AEA - Rename 'class' parameter by 'css_class'
				'css_class' => ''
			), $params));
	$content = str_replace("]<br />", ']', $content);
	$content = str_replace("]<br />\n", ']', $content);
	$content = str_replace("<br />\n[", '[', $content);
        // AEA - Rename 'class' parameter by 'css_class'
	$out = '<div class="btn-toolbar '.$css_class.EBS_CONTAINER_CLASS.'" role="toolbar">' . do_shortcode($content) . '</div>';

	return $out;
}

add_shortcode('btngrptoolbar', 'osc_theme_btngrptoolbar');

?>