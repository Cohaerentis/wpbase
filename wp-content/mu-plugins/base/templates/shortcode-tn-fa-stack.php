<?php
    if (!empty($size))                      $class .= ' fa-' . $size;
?>
<span class="fa-stack <?php echo $class; ?>" <?php if (!empty($id)) : ?>id="<?php echo $id; ?>"<?php endif; ?>><?php echo do_shortcode($content); ?></span>