<?php

/* * *********************************************************
 * HR Rule
 * ********************************************************* */

function theme_hrrule($params, $content = null) {
    extract(shortcode_atts(array(
                'style' => '',
                // AEA - Rename 'class' parameter by 'css_class'
                'css_class' => '',
                'margin' => ''
                    ), $params));
    $out = '';$margin1='';
    if ($margin != '') {
        $margin1 = ' style="margin:' . $margin . 'px 0"';
    }
    // AEA - Rename 'class' parameter by 'css_class'
    $out = '<hr ' . $margin1 . 'class="' . $css_class . ' ' . $style . ' osc-rule" />';

    return $out;
}

add_shortcode('rule', 'theme_hrrule');

