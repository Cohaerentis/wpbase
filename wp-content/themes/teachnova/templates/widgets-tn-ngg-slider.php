<!-- Carousel
    ================================================== -->
<div id="<?php echo $id; ?>" class="carousel slide <?php echo $class; ?>" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  <?php $i = 0; foreach ($images as $image) : ?>
    <li data-target="#<?php echo $id; ?>"
        data-slide-to="<?php echo $i; ?>"
        <?php if ($i == 0) : ?>
          class="active"
        <?php endif; ?>
      >
    </li>
  <?php $i++; endforeach; ?>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
<?php $i = 0; foreach ($images as $image) : ?>
  <?php
    $src = '/' . $gallery->path . '/' . $image->filename;
    $class = 'item';
    $url = empty($image->ngg_custom_fields['URL']) ? 'no-url-defined' : $image->ngg_custom_fields['URL'];
    if ($i == 0) $class .= ' active';
  ?>
    <div class="<?php echo $class ?>">
      <img src="<?php echo $src; ?>" alt="<?php echo $id; ?>" class="img-responsive">
      <div class="carousel-caption">
        <h3><?php echo $image->alttext; ?></h3>
        <p><?php echo $image->description; ?><?php /* , URL = <?php echo $url; ?>*/?></p>
      </div>
    </div>
<?php $i++; endforeach; ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#<?php echo $id; ?>" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#<?php echo $id; ?>" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
