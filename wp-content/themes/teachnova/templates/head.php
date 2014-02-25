<?php
  $jsie8warning   = 'ie8-responsive-file-warning.js';
  $jsrespond      = 'respond-1.3.0.min.js';
  $jshtml5shiv    = 'html5shiv-3.7.0.min.js';
  if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
    $jsrespond      = 'respond-1.3.0.js';
    $jshtml5shiv    = 'html5shiv-3.7.0.js';
  }
  $urlie8warning  = get_template_directory_uri() . '/assets/js/vendor/' . $jsie8warning;
  $urlrespond     = get_template_directory_uri() . '/assets/js/vendor/' . $jsrespond;
  $urlhtml5shiv   = get_template_directory_uri() . '/assets/js/vendor/' . $jshtml5shiv;
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Wordpress Base by Teachnova">
  <meta name="author" content="Antonio Espinosa">
  <link rel="shortcut icon" href="/favicon.ico">
  <link type="text/plain" rel="author" href="/humans.txt" />
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); ?>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="<?php echo $urlie8warning; ?>"></script>
    <script src="<?php echo $urlrespond; ?>"></script>
    <script src="<?php echo $urlhtml5shiv; ?>"></script>
  <![endif]-->

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
</head>
