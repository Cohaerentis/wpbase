<?php

/* * *********************************************************
 * BUTTONS
 * ********************************************************* */

function osc_theme_icon($params, $content = null) {
    extract(shortcode_atts(array(
        'type' => '',
        'color'=>'',
         // AEA - Rename 'class' parameter by 'css_class'
        'css_class' => '',
        'fontsize'=>''
    ), $params));
    if($color!=''){
        $color='color:'.$color.';';
    }
    if($fontsize!=''){
        $fontsize=' font-size:'.$fontsize.'px;';
    }
    // AEA - Rename 'class' parameter by 'css_class'
    $out = '<i class="glyphicon ' . $type . ' ' . $css_class . '" style="'.$color.$fontsize.'"></i>';
    return $out;
}

add_shortcode('icon', 'osc_theme_icon');

