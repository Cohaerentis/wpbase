<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  <?php // AEA - Topbar ?>
  <?php if (roots_display_topbar()) : ?>
  <div class="container">
    <div class="row">
      <aside class="topbar" class="<?php echo roots_sidebar_class('top'); ?>" role="complementary">
          <?php include roots_sidebar_path('top'); ?>
      </aside><!-- /.topbar -->
    </div>
  </div>
  <?php endif; ?>

  <div class="wrap container" role="document">
    <div class="content row">
  <?php /* AEA - For debugging propuses * /
  wrout("Base template : " . var_export(Roots_Wrapping::$base, true));
  wrout("Main template : " . var_export(Roots_Wrapping::$main_template, true));
  wrout("Frontpage : " . var_export(is_front_page(), true));
  /* */ ?>
      <main class="main <?php echo roots_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar <?php echo roots_sidebar_class('side'); ?>" role="complementary">
          <?php include roots_sidebar_path('side'); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php // AEA - Bottombar ?>
  <?php if (roots_display_bottombar()) : ?>
  <div class="container">
    <div class="row">
      <aside class="bottombar" class="<?php echo roots_sidebar_class('bottom'); ?>" role="complementary">
        <?php include roots_sidebar_path('bottom'); ?>
      </aside>
    </div>
  </div>
  <?php endif; ?>

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
