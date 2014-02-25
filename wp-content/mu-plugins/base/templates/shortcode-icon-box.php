<?php
    $param_id = '';
    if (!empty($css_id)) $param_id = 'id="' . $css_id . '"';
    $tag = 'div';
    $param_href = '';
    if (empty($href) && !empty($href_option)) {
        $href = of_get_option($href_option, false);
    }
    if (!empty($href)) {
        $tag = 'a';
        $param_href = 'href="' . $href . '"';
    }
?>
<<?php echo $tag; ?> class="tn-icon-box <?php echo $css_class; ?>"
 <?php echo $param_id; ?>
 <?php echo $param_href; ?> >
    <div class="box-icon">
        <?php echo do_shortcode($content); ?>
    </div>
    <?php if (!empty($label)) : ?>
    <div class="box-label">
        <p><?php echo $label; ?></p>
    </div>
    <?php endif; ?>
</<?php echo $tag; ?>>