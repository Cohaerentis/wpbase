<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
<nav id="comments-nav" class="pager">
   <ul class="pager">
      <?php if (get_previous_comments_link()) : ?>
         <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'roots')); ?></li>
      <?php else: ?>
         <li class="previous disabled"><a><?php _e('&larr; Older comments', 'roots'); ?></a></li>
      <?php endif; ?>
      <?php if (get_next_comments_link()) : ?>
         <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'roots')); ?></li>
      <?php else: ?>
         <li class="next disabled"><a><?php _e('Newer comments &rarr;', 'roots'); ?></a></li>
      <?php endif; ?>
   </ul>
</nav>
<?php endif; // check for comment navigation ?>
