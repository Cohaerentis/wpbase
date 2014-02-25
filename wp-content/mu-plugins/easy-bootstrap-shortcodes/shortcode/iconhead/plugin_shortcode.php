<?php

function osc_theme_iconhead($params, $content = null) {
    extract(shortcode_atts(array(
                // AEA - Rename 'class' parameter by 'css_class'
                'css_class' => '',
                'style' => '',
                'type' => 'h1',
                'color'=>''
                    ), $params));
    $out = '';
    if($color!=''){
        $color='style="color:'.$color.';"';
    }
    if ($style != '') {
        $style = ' <span class="glyphicon ' . $style . '" '.$color.'></span> ';
    }
    // AEA - Rename 'class' parameter by 'css_class'
    $out = '<' . $type . ' class="' . $css_class .EBS_CONTAINER_CLASS. '" >' . $style . do_shortcode($content) . '</' . $type . '>';

    return $out;
}

add_shortcode('iconheading', 'osc_theme_iconhead');

