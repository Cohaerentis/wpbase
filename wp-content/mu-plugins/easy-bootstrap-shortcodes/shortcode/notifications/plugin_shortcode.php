<?php

function osc_theme_notification($atts, $content = null) {
    extract(shortcode_atts(array(
                'type' => '',
                'close' => 'false',
                // AEA - Rename 'class' parameter by 'css_class'
                'css_class' => ''
                    ), $atts));
    $type = ($close == 'true' ? $type . ' alert-dismissable' : $type);


    // AEA - Rename 'class' parameter by 'css_class'
    $result = '<div class = "alert ' . $type . ' ' . $css_class .EBS_CONTAINER_CLASS. '">';
    if ($close == 'true') {
        $result .= '<button type = "button" class = "close'.EBS_CONTAINER_CLASS.'" data-dismiss = "alert" aria-hidden = "true">&times;
    </button>';
    }
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('notification', 'osc_theme_notification');





