<?php

function osc_theme_btngrp($params, $content = null) {
    extract(shortcode_atts(array(
                'style' => '',
                // AEA - Rename 'class' parameter by 'css_class'
                'css_class' => ''
                    ), $params));
    $content = str_replace("]<br />", ']', $content);
    $content = str_replace("]<br />\n", ']', $content);
    $content = str_replace("<br />\n[", '[', $content);
    $out='';
    if ($style =='vertical') {
            // AEA - Rename 'class' parameter by 'css_class'
	    $out .= '<div class="btn-group-vertical '  . $css_class.EBS_CONTAINER_CLASS . '">' . do_shortcode($content) . '</div>';
    } elseif ($style =='justified') {
            // AEA - Rename 'class' parameter by 'css_class'
	    $out .= '<div class="btn-group btn-group-justified '  . $css_class.EBS_CONTAINER_CLASS . '">' . do_shortcode($content) . '</div>';
    }else{
            // AEA - Rename 'class' parameter by 'css_class'
	    $out .= '<div class="btn-group '  . $css_class.EBS_CONTAINER_CLASS . '">' . do_shortcode($content) . '</div>';
    }


    return $out;
}

add_shortcode('buttongroup', 'osc_theme_btngrp');

?>