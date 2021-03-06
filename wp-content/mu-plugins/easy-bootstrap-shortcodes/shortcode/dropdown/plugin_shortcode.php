<?php

function osc_theme_dropdown($params, $content = null) {
    extract(shortcode_atts(array(
                'dropup' => '',
                // AEA - Rename 'class' parameter by 'css_class'
                'css_class' => ''
                    ), $params));
    $content = str_replace("]<br />", ']', $content);
    $content = str_replace("]<br />\n", ']', $content);
    $content = str_replace("<br />\n[", '[', $content);
    if ($dropup != 'dropup') {
        $dropup = '';
    }
    // AEA - Rename 'class' parameter by 'css_class'
    $out = '<div class="btn-group ' . $dropup . ' ' . $css_class .EBS_CONTAINER_CLASS. '">' . do_shortcode($content) . '</div>';
    $out .= "
    <script>
       jQuery(document).ready(function(){
        jQuery('.dropdown-toggle').dropdown();
        });
    </script>
    ";
    return $out;
}

add_shortcode('dropdown', 'osc_theme_dropdown');

function osc_theme_dropdown_head($params, $content = null) {
    extract(shortcode_atts(array(
                'size' => '',
                'style' => '',
                'split' => ''), $params));
    $out = '';
    if ($split == "split") {
        $out = '<button type="button" class="btn ' . $size . ' ' . $style .EBS_CONTAINER_CLASS. '">' . $content . '</button>';

        $out .= '<button type="button" class="btn ' . $size . ' ' . $style .EBS_CONTAINER_CLASS. ' dropdown-toggle" data-toggle="dropdown">';
        $out .= '<span class="caret'.EBS_CONTAINER_CLASS.'"></span></button>';
    } else {
        $out = ' <button type="button" class="btn ' . $size . ' ' . $style .EBS_CONTAINER_CLASS. ' dropdown-toggle" data-toggle="dropdown">';
        $out .= $content . ' <span class="caret'.EBS_CONTAINER_CLASS.'"></span> </button>';
    }

    return $out;
}

add_shortcode('dropdownhead', 'osc_theme_dropdown_head');

function osc_theme_dropdown_body($params, $content = null) {
    $content = str_replace("]<br />", ']', $content);
    $content = str_replace("]<br />\n", ']', $content);
    $content = str_replace("<br />\n[", '[', $content);
    $out = '<ul class="dropdown-menu'.EBS_CONTAINER_CLASS.'" role="menu">' . do_shortcode($content) . '</ul>';
    return $out;
}

add_shortcode('dropdownbody', 'osc_theme_dropdown_body');

function osc_theme_dropdown_items($params, $content = null) {
    extract(shortcode_atts(array(
                'type' => '',
                'link' => '',
                'disabled' => ''), $params));
    $out = '';
    $out = '';
    if ($type == "divider") {
        $out = '<li class="divider'.EBS_CONTAINER_CLASS.'"></li>';
    } elseif ($type == "menuitem") {
        if ($disabled == 'disabled') {
            $out = '<li class="disabled'.EBS_CONTAINER_CLASS.'"><a class="'.EBS_CONTAINER_CLASS.'" href="' . $link . '">' . do_shortcode($content) . '</a></li>';
        } else {
            $out = '<li><a class="'.EBS_CONTAINER_CLASS.'" href="' . $link . '">' . do_shortcode($content) . '</a></li>';
        }
    }
    return $out;
}

add_shortcode('dropdownitem', 'osc_theme_dropdown_items');
?>