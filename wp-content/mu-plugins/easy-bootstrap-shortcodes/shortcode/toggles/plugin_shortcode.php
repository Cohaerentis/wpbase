<?php

/* * *********************************************************
 * jQuery UI Accordion (toggles)
 * ********************************************************* */

$_oscitas_accordion = array();

function osc_theme_toggles($params, $content = null) {
    global $_oscitas_accordion;
    extract(shortcode_atts(array(
                'id' => count($_oscitas_accordion),
                // AEA - Rename 'class' parameter by 'css_class'
                'css_class' => ''
                    ), $params));
    $_oscitas_accordion[$id] = array();
    $scontent = do_shortcode($content);

    $output = '';
    if (trim($scontent) != '' || count($_oscitas_accordion[$id]['details'])) {
        $scontent = isset($_oscitas_accordion[$id]['details']) && is_array($_oscitas_accordion[$id]['details']) ? implode('', $_oscitas_accordion[$id]['details']) : '';
        // AEA - Rename 'class' parameter by 'css_class'
        $output .= '<div class="panel-group ' . $css_class .EBS_CONTAINER_CLASS. '" id="oscitas-accordion-' . $id . '">' . $scontent;
        $output .= '</div>';
    }
    return $output;
}

add_shortcode('toggles', 'osc_theme_toggles');

function osc_theme_toggle($params, $content = null) {
    global $_oscitas_accordion;
    extract(shortcode_atts(array(
                'title' => 'title',
                // AEA - Rename 'class' parameter by 'css_class'
                'css_class' => '',
                // AEA - User can add a caret, at left of title
                'caret' => 'yes',
                // AEA - User can open this toggle in initial page load
                'in' => 'no',
                    ), $params));
    $con = do_shortcode($content);
    $index = count($_oscitas_accordion) - 1;
    $id = isset($_oscitas_accordion[$index]['details'])?'details-' . $index . '-' . count($_oscitas_accordion[$index]['details']):'details-' . $index . '-0';
    // AEA - User can add a caret, at left of title
    if (strtolower($caret) == 'yes') $caret = '<span class="caret"></span>';
    $header_class = '';
    if (strtolower($in) == 'yes') $css_class .= ' in';
    else $header_class = 'collapsed';
    $_oscitas_accordion[$index]['details'][] = <<<EOS
        <div class="panel panel-default{$const['EBS_CONTAINER_CLASS']}">
            <a class="panel-heading{$const['EBS_CONTAINER_CLASS']} accordion-toggle{$const['EBS_CONTAINER_CLASS']} {$header_class}" data-toggle="collapse"
                data-parent="#oscitas-accordion-{$index}"
                href="#{$id}">
                <div class="panel-info-marker"></div>
              <h4 class="panel-title{$const['EBS_CONTAINER_CLASS']}">
                {$caret}
                {$title}
              </h4>
            </a>
            <div id="{$id}" class="panel-collapse collapse {$css_class}{$const['EBS_CONTAINER_CLASS']}">
              <div class="panel-body{$const['EBS_CONTAINER_CLASS']}">
                {$con}
              </div>
            </div>
        </div>
EOS;
}

add_shortcode('toggle', 'osc_theme_toggle');