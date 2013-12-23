<?php
    if (!empty($size))                      $css_class .= ' fa-' . $size;
    if (strtolower($border) == 'yes')       $css_class .= ' fa-border';
    if (strtolower($fixed_width) == 'yes')  $css_class .= ' fa-fw';
    if (strtolower($spin) == 'yes')         $css_class .= ' fa-spin';
    if (strtolower($inverse) == 'yes')      $css_class .= ' fa-inverse';
    if (!empty($rotate))                    $css_class .= ' fa-' . $rotate;
    if (!empty($stack))                     $css_class .= ' fa-stack-' . $stack;
?>
<i class="fa fa-<?php echo $name; ?> <?php echo $css_class; ?>"<?php if (!empty($css_id)) : ?>id="<?php echo $css_id; ?>"<?php endif; ?>></i>
