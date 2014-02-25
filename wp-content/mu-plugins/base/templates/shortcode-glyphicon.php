<?php
    $baseclass = 'glyphicons';
    if ($type == 'halflings') {
        $baseclass = 'glyphicon';
        $name = 'glyphicon-' . $name;
    } else if ($type == 'social') {
        $baseclass = 'glyphicons-social';
    } else if ($type == 'filetypes') {
        $baseclass = 'glyphicons-filetypes';
    }

    if (strtolower($spin) == 'yes')         $css_class .= ' glyphicons-spin';
    if (!empty($rotate))                    $css_class .= ' glyphicons-' . $rotate;
    $style = '';
    if (!empty($color)) $style = 'style="color: ' . $color . ';"';
    $param_id = '';
    if (!empty($css_id)) $param_id = 'id="' . $css_id . '"';
    $param_href = '';
    if (!empty($href)) {
        $param_href = 'href="' . $href . '"';
        if ($tag != 'a') $tag = 'a';
    }
?>
<<?php echo $tag; ?> <?php echo $param_href; ?>
 class="<?php echo $baseclass; ?> <?php echo $name; ?> <?php echo $css_class; ?>"
 <?php echo $param_id; ?>
 <?php echo $style; ?>></<?php echo $tag; ?>>
