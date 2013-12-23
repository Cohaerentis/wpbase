<?php
  $post_content = sanitize_post_field( 'post_content', $page->post_content, $page->ID, 'display' );
?>
<!-- Embed Page : pageid = <?php echo $pageid; ?>
    ================================================== -->
<div id="tn-embed-page-<?php echo $pageid; ?>" class="tn-embed-page">
  <article class="content <?php echo $class; ?>" <?php if (!empty($id)) : ?>id="<?php echo $id; ?>"<?php endif; ?>>
    <div class="container">
      <?php echo do_shortcode($post_content); ?>
    </div>
  </article>
</div>
