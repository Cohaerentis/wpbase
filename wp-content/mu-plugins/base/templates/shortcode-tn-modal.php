<?php
  if (empty($id)) $id = 'tn-modal-' . rand(1000, 2000);

?>
<?php if (!empty($btn_p_class)) : ?>
<p class="<?php echo $btn_p_class; ?>">
<?php endif; ?>
<a href="#" class="btn btn-<?php echo $btn_type; ?> btn-<?php echo $btn_size; ?> <?php echo $class; ?>"
   data-toggle="modal"
   data-target="#<?php echo $id; ?>">
   <?php echo $btn_label; ?>
</a>
<?php if (!empty($btn_p_class)) : ?>
</p>
<?php endif; ?>
<div class="modal fade <?php echo $class; ?>" id="<?php echo $id; ?>" tabindex="-1" role="dialog"
     aria-labelledby="modal-label-<?php echo $id; ?>" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="modal-label-<?php echo $id; ?>"><?php echo $title; ?></h4>
      </div>
      <div class="modal-body">
        <?php echo do_shortcode($content); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php if (!empty($submit_link)) : ?>
          <a href="<?php echo $submit_link; ?>" class="btn btn-<?php echo $submit_type; ?>">
            <?php echo $submit_label; ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>