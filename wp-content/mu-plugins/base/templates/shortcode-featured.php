<?php
    $extras = '';
    if (!empty($css_class)) $extras = ' class="' . $css_class . '"';
    if (!empty($css_id))    $extras = ' id="' . $css_id . '"';
?>
<<?php echo $tag;?><?php echo $extras;?>><?php echo do_shortcode($content); ?></<?php echo $tag;?>>
