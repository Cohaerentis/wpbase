<?php
    if (!empty($size))                      $css_class .= ' fa-' . $size;
    $param_id = '';
    if (!empty($css_id)) $param_id = 'id="' . $css_id . '"';
?>
<span class="fa-stack <?php echo $css_class; ?>" <?php echo $param_id; ?> >
    <?php echo do_shortcode($content); ?>
</span>