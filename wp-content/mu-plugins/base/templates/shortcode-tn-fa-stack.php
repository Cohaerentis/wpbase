<?php
    if (!empty($size))                      $css_class .= ' fa-' . $size;
?>
<span class="fa-stack <?php echo $css_class; ?>" <?php if (!empty($css_id)) : ?>id="<?php echo $css_id; ?>"<?php endif; ?>><?php echo do_shortcode($content); ?></span>