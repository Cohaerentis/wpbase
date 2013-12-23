<?php
    if (!empty($size))                      $class .= ' fa-' . $size;
    if (strtolower($border) == 'yes')       $class .= ' fa-border';
    if (strtolower($fixed_width) == 'yes')  $class .= ' fa-fw';
    if (strtolower($spin) == 'yes')         $class .= ' fa-spin';
    if (strtolower($inverse) == 'yes')      $class .= ' fa-inverse';
    if (!empty($rotate))                    $class .= ' fa-' . $rotate;
    if (!empty($stack))                     $class .= ' fa-stack-' . $stack;
?>
<i class="fa fa-<?php echo $name; ?> <?php echo $class; ?>"<?php if (!empty($id)) : ?>id="<?php echo $id; ?>"<?php endif; ?>></i>
