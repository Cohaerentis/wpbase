<?php

/* * *********************************************************
 * BUTTONS
 * ********************************************************* */

function osc_theme_well($params, $content = 'Label') {
    extract(shortcode_atts(array(
                'type' => '',
                // AEA - Rename 'class' parameter by 'css_class'
                'css_class' => ''
                    ), $params));
    $out = '';
    $content = str_replace('<br class="osc" />', '', $content);
    $content = str_replace('<br class="osc" />\n', '', $content);
    // AEA - Rename 'class' parameter by 'css_class'
    $out = '<div class="well ' . $type . ' ' . $css_class .EBS_CONTAINER_CLASS. '">' . do_shortcode($content) . '</div>';
    return $out;
}

add_shortcode('well', 'osc_theme_well');

