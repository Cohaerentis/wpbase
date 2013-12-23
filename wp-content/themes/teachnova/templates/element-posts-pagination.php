<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <?php if (get_next_posts_link()) : ?>
        <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <?php else: ?>
        <li class="previous disabled"><a><?php _e('&larr; Older posts', 'roots'); ?></a></li>
      <?php endif; ?>
      <?php if (get_previous_posts_link()) : ?>
        <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
      <?php else: ?>
        <li class="next disabled"><a><?php _e('Newer posts &rarr;', 'roots'); ?></a></li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif; ?>
