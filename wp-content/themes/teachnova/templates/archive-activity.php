<?php get_template_part('templates/element-if-noresults'); ?>

<?php $index = 0; while (have_posts()) : the_post(); ?>
   <?php if (($index % 2) == 0) : ?>
   <div class="container"><div class="row">
   <?php endif; ?>
   <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="mosaic-item span4">
         <?php
            $link_extra = '';
            $landingpage = get_post_meta( get_the_ID(), 'activity_landingpage', true );
            if (empty($landingpage)) $landingpage = get_permalink();
            else $link_extra = 'target="_blank"';
         ?>
         <a href="<?php echo $landingpage; ?>" title="<?php the_title(); ?>" <?php echo $link_extra; ?>>
            <div class="entry-infografia">
               <img src="<?php echo get_post_meta( get_the_ID(), 'activity_infographic', true );?>" alt="<?php the_title(); ?>" >
            </div>
            <div class="hide">
               <h2 class="entry-title"><?php the_title(); ?></h2>
               <footer class="entry-meta">
                  <span class="activity-date"><?php echo date('d/m/Y', get_post_meta( get_the_ID(), 'activity_date', true ));?></span>
               </footer>
            </div>
         </a>
      </div>
   </article>
   <?php if (($index % 2) == 1) : ?>
   </div></div>
   <?php endif; ?>
<?php $index++; endwhile; ?>
   <?php if (($index % 2) == 1) : ?>
   </div></div>
   <?php endif; ?>

<?php get_template_part('templates/element-posts-pagination'); ?>
