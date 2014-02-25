<?php
    if (!empty($size))                      $css_class .= ' fa-' . $size;
    if (strtolower($border) == 'yes')       $css_class .= ' fa-border';
    if (strtolower($fixed_width) == 'yes')  $css_class .= ' fa-fw';
    if (strtolower($spin) == 'yes')         $css_class .= ' fa-spin';
    if (strtolower($inverse) == 'yes')      $css_class .= ' fa-inverse';
    if (!empty($rotate))                    $css_class .= ' fa-' . $rotate;
    if (!empty($stack))                     $css_class .= ' fa-stack-' . $stack;
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
 class="fa fa-<?php echo $name; ?> <?php echo $css_class; ?>"
 <?php echo $param_id; ?>
 <?php echo $style; ?>></<?php echo $tag; ?>>
