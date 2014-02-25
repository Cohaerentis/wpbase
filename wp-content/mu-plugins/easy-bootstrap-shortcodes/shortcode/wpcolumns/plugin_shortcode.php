<?php

/* * *********************************************************
 * Row
 * ********************************************************* */

function osc_theme_row($params, $content = null) {
    extract(shortcode_atts(array(
        'mdhide' => '',
        'smhide' => '',
        'hshide' => '', // AEA - Horizontal Small Devices
        'xshide' => '',
        'lghide' => '',
        'css_class' => '',
        'tag' => 'div' // AEA - Allow user to set custom HTML tag
    ), $params));

    $classes = array($css_class);
    // AEA - Horizontal Small Devices
    // $arr2 = array('mdhide', 'smhide', 'xshide', 'lghide');
    $arr2 = array('mdhide', 'smhide', 'hshide', 'xshide', 'lghide');
    foreach ($arr2 as $k => $aa) {
        $nn = str_replace('hide', '', $aa);
        if (${$aa} == 'yes') {
            $classes[] = 'hidden-' . $nn;
        }
    }

    // AEA - Allow user to set custom HTML tag
    // $result = '<div class="row ' . $css_class . '">';
    $result = '<' . $tag . ' class="row ' . implode(' ', $classes) . EBS_CONTAINER_CLASS . '">';
    //echo '<textarea>'.$content.'</textarea>';
    $content = str_replace("]<br />", ']', $content);
    $content = str_replace("<br />\n[", '[', $content);
    $result .= do_shortcode($content);
    // AEA - Allow user to set custom HTML tag
    // $result .= '</div>';
    $result .= '</' . $tag . '>';

    return $result;
}

add_shortcode('row', 'osc_theme_row');
// AEA - Add alias to nesting shortcodes
add_shortcode('subrow', 'osc_theme_row');
add_shortcode('sub2row', 'osc_theme_row');
add_shortcode('sub3row', 'osc_theme_row');
add_shortcode('sub4row', 'osc_theme_row');

/* * *********************************************************
 * TWO
 * ********************************************************* */

function osc_theme_column($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'sm' => '',
        'hs' => '', // AEA - Horizontal Small Devices
        'xs' => '',
        'lg' => '',
        'mdoff' => '',
        'smoff' => '',
        'hsoff' => '', // AEA - Horizontal Small Devices
        'xsoff' => '',
        'lgoff' => '',
        'mdhide' => '',
        'smhide' => '',
        'hshide' => '', // AEA - Horizontal Small Devices
        'xshide' => '',
        'lghide' => '',
        'mdclear' => '',
        'hsclear' => '', // AEA - Horizontal Small Devices
        'smclear' => '',
        'xsclear' => '',
        'lgclear' => '',
        'off'=>'',
        'css_class' => '', // AEA - Allow user to add custom class
        'tag' => 'div' // AEA - Allow user to set custom HTML tag
    ), $params));


    // AEA - Horizontal Small Devices
    // $arr = array('md', 'xs', 'sm');
    $arr = array('lg', 'md', 'sm', 'hs', 'xs');
    // AEA - Allow user to add custom class
    // $classes = array();
    $classes = array($css_class);
    foreach ($arr as $k => $aa) {
        ${$aa} = trim(${$aa});
        if (${$aa} == 12 || ${$aa} == '') {
            $classes[] = 'col-' . $aa . '-12';
        } else {
            $classes[] = 'col-' . $aa . '-' . ${$aa};
        }
    }
    // AEA - Horizontal Small Devices
    // $arr2 = array('mdoff', 'smoff', 'xsoff', 'lgoff');
    $arr2 = array('mdoff', 'smoff', 'hsoff', 'xsoff', 'lgoff');
    foreach ($arr2 as $k => $aa) {
        $nn = str_replace('off', '', $aa);
        // AEA - Bugfix, user can set offset 0 in order to override other offset
        // if (${$aa} == 0 || ${$aa} == '') {
        if (${$aa} == '') {
            //$classes[] = '';
        } else {
            $classes[] = 'col-' . $nn . '-offset-' . ${$aa};
        }
    }
    // AEA - Horizontal Small Devices
    // $arr2 = array('mdhide', 'smhide', 'xshide', 'lghide');
    $arr2 = array('mdhide', 'smhide', 'hshide', 'xshide', 'lghide');
    foreach ($arr2 as $k => $aa) {
        $nn = str_replace('hide', '', $aa);
        if (${$aa} == 'yes') {
            $classes[] = 'hidden-' . $nn;
        }
    }
    // AEA - Horizontal Small Devices
    // $arr2 = array('mdclear', 'smclear', 'xsclear', 'lgclear');
    $arr2 = array('mdclear', 'smclear', 'hsclear', 'xsclear', 'lgclear');
    foreach ($arr2 as $k => $aa) {
        $nn = str_replace('clear', '', $aa);
        if (${$aa} == 'yes') {
            $classes[] = 'clear-' . $nn;
        }
    }
    if ($off != '') {
        $classes[] = 'col-lg-offset-'.$off;
    }

    if ($off != '') {
        $classes[] = 'col-lg-offset-'.$off;
    }
    // AEA - Allow user to set custom HTML tag
    // $result = '<div class="col-lg-' . $lg . ' ' . implode(' ', $classes) . '">';
    $result = '<' . $tag . ' class="' . implode(' ', $classes) . EBS_CONTAINER_CLASS . '">';
    $result .= do_shortcode($content);
    // AEA - Allow user to set custom HTML tag
    // $result .= '</div>';
    $result .= '</' . $tag . '>';

    return $result;
}

add_shortcode('column', 'osc_theme_column');
// AEA - Add alias to nesting shortcodes
add_shortcode('subcolumn', 'osc_theme_column');
add_shortcode('sub2column', 'osc_theme_column');
add_shortcode('sub3column', 'osc_theme_column');
add_shortcode('sub4column', 'osc_theme_column');

// AEA - Applying DRY Principle
function osc_theme_layout($params, $content = null) {
    extract(shortcode_atts(array(
        'md' => '',
        'hs' => '', // AEA - Horizontal Small Devices
        'sm' => '',
        'xs' => '',
        'off' => '',
        'lg' => '',
        'css_class' => '',
        'extra' => ''
    ), $params));
    $cols = 'col-lg-' . $lg;
    if (!empty($md) && $md != 12) {
        $cols .= ' col-md-' . $md;
    }
    if (!empty($sm) && $sm != 12) {
        $cols .= ' col-sm-' . $sm;
    }
    if (!empty($hs) && $hs != 12) {
        $cols .= ' col-hs-' . $hs;
    }
    if (!empty($xs) && $xs != 12) {
        $cols .= ' col-xs-' . $xs;
    }
    // AEA - Horizontal Small Devices
    // $result = '<div class="col-lg-6 ' . $mds . ' ' . $sms . ' ' . $xss . ' col-lg-offset-' . $off . '  one-half">';
    $result = '<div class="' . $cols . ' col-lg-offset-' . $off . ' ' . $extra . ' ' . $css_class . EBS_CONTAINER_CLASS . '">';
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

function osc_theme_one_half($params, $content = null) {
    $params['lg']       = '6';
    $params['extra']    = 'one-half';

    return osc_theme_layout($params, $content);
}

add_shortcode('one_half', 'osc_theme_one_half');

function osc_theme_one_half_last($params, $content = null) {
    $params['lg']       = '6';
    $params['extra']    = 'one-half-last';

    return osc_theme_layout($params, $content);
}

add_shortcode('one_half_last', 'osc_theme_one_half_last');

/* * *********************************************************
 * THIRD
 * ********************************************************* */

function osc_theme_one_third($params, $content = null) {
    $params['lg']       = '4';
    $params['extra']    = 'sc-column';

    return osc_theme_layout($params, $content);
}

add_shortcode('one_third', 'osc_theme_one_third');

function osc_theme_one_third_last($params, $content = null) {
    $params['lg']       = '4';
    $params['extra']    = 'column-last';

    return osc_theme_layout($params, $content);
}

add_shortcode('one_third_last', 'osc_theme_one_third_last');

function osc_theme_two_third($params, $content = null) {
    $params['lg']       = '8';
    $params['extra']    = '';

    return osc_theme_layout($params, $content);
}

add_shortcode('two_third', 'osc_theme_two_third');

function osc_theme_two_third_last($params, $content = null) {
    $params['lg']       = '8';
    $params['extra']    = 'column-last';

    return osc_theme_layout($params, $content);
}

add_shortcode('two_third_last', 'osc_theme_two_third_last');

/* * *********************************************************
 * FOURTH
 * ********************************************************* */

function osc_theme_one_fourth($params, $content = null) {
    $params['lg']       = '3';
    $params['extra']    = 'one-fourth';

    return osc_theme_layout($params, $content);
}

add_shortcode('one_fourth', 'osc_theme_one_fourth');

function osc_theme_one_fourth_last($params, $content = null) {
    $params['lg']       = '3';
    $params['extra']    = 'column-last one-fourth-last';

    return osc_theme_layout($params, $content);
}

add_shortcode('one_fourth_last', 'osc_theme_one_fourth_last');

function osc_theme_three_fourth($params, $content = null) {
    $params['lg']       = '3';
    $params['extra']    = 'three-fourth';

    return osc_theme_layout($params, $content);
}

add_shortcode('three_fourth', 'osc_theme_three_fourth');

function osc_theme_three_fourth_last($params, $content = null) {
    $params['lg']       = '6';
    $params['extra']    = 'column-last three-fourth-last';

    return osc_theme_layout($params, $content);
}

add_shortcode('three_fourth_last', 'osc_theme_three_fourth_last');

function osc_theme_one_fourth_second($params, $content = null) {
    $params['lg']       = '3';
    $params['extra']    = 'one-fourth-second';

    return osc_theme_layout($params, $content);
}

add_shortcode('one_fourth_second', 'osc_theme_one_fourth_second');

function osc_theme_one_fourth_third($params, $content = null) {
    $params['lg']       = '3';
    $params['extra']    = 'one-fourth-third';

    return osc_theme_layout($params, $content);
}

add_shortcode('one_fourth_third', 'osc_theme_one_fourth_third');

function osc_theme_one_half_second($params, $content = null) {
    $params['lg']       = '6';
    $params['extra']    = 'one-half-second';

    return osc_theme_layout($params, $content);
}

add_shortcode('one_half_second', 'osc_theme_one_half_second');

function osc_theme_one_third_second($params, $content = null) {
    $params['lg']       = '4';
    $params['extra']    = 'one-third-second';

    return osc_theme_layout($params, $content);
}

add_shortcode('one_third_second', 'osc_theme_one_third_second');

function osc_theme_one_column($params, $content = null) {
    $params['lg']       = '12';
    $params['extra']    = 'one-column';

    return osc_theme_layout($params, $content);
}

add_shortcode('one_column', 'osc_theme_one_column');
