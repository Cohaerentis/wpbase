<?php
   $country = get_query_var('country');
   $term = get_term_by('slug', $country, 'country');

   $metas = get_option('country_section');
   if (empty($metas)) $metas = array();
   if (!is_array($metas)) $metas = (array) $metas;
   $meta = isset($metas[$term->term_id]) ? $metas[$term->term_id] : array();

   $gmap = (!empty($meta['country_gmap'])) ? $meta['country_gmap'] : '';
   $summary = (!empty($meta['country_summary'])) ? $meta['country_summary'] : '';
   $flag = (!empty($meta['country_flag'][0])) ? wp_get_attachment_image_src($meta['country_flag'][0], 'full') : false;
?>
<?php if (!empty($term)) : ?>
   <article <?php post_class() ?> id="term-taxonomia-<?php echo $term->term_id; ?>">
      <div class="page-header">
         <h1 class="entry-title"><?php echo $term->name; ?></h1>
      </div>
      <div class="entry-content">
         <?php if (!empty($flag)) : ?>
         <img src="<?php echo $flag; ?>" class="country-flag">
         <?php endif; ?>
         <?php echo $summary; ?>
      </div>
      <?php if (!empty($gmap)) {
         $html = do_shortcode('[gmap class="country-map" address="' . $gmap . '"]');
         echo $html;
      } ?>
   </article>

<?php else : ?>
   <?php get_template_part('templates/element-noresults'); ?>
<?php endif; ?>

