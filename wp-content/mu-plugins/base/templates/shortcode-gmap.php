<?php
    // Original code from Shortcodes Ultimate [http://gndev.info/shortcodes-ultimate/]
    $url  = '//maps.google.com/maps';
    $url .= '?q=' . urlencode($address);
    $url .= '&amp;output=embed';
    $url .= '&amp;ie=UTF8';
    $url .= '&amp;oe=UTF8';
    $url .= '&amp;z=' . urlencode($zoom);
    $url .= '&amp;f=' . urlencode($display);
    $url .= '&amp;t=' . urlencode($type);
    if (!empty($layer))     $url .= '&amp;layer=' . urlencode($layer);
    if (!empty($print))     $url .= '&amp;pw=1';
    if (!empty($expinfo))   $url .= '&amp;iwd=1';
    $url .= '&amp;view=' . urlencode($view);
    $url .= '&amp;iwloc=' . urlencode($info);
    $url .= '&amp;hl=' . urlencode($lang);

    $param_id = '';
    if (!empty($css_id)) $param_id = 'id="' . $css_id . '"';
    $div_style = '';
    $iframe_style = 'width="' . $width . '" height="' . $height . '"';
    if (strtolower($responsive) == 'yes') {
        // 61.80% is the golden ratio
        $div_style = 'style="position: relative; padding-bottom: 61.80%; height: 0; overflow: hidden;"';
        $iframe_style = 'style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;"';
    }
?>
<div class="tn-gmap <?php echo $css_class; ?>" <?php echo $param_id; ?> <?php echo $div_style; ?>>
    <iframe <?php echo $iframe_style; ?> src="<?php echo $url; ?>"></iframe>
</div>