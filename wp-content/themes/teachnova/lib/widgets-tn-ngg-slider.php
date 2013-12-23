<?php
/**
 * Teachnova NGG Gallery Slider, using Bootstrap + jQuery Carousel
 */
class TN_NGG_Slider_Widget extends WP_Widget {
  private $fields = array(
    'title'   => array('type'    => 'text',
                       'label'   => 'Title'),
    'show_title' => array('type' => 'checkbox',
                       'label'   => 'Display title before page'),
    'gallery' => array('type'    => 'text',
                       'label'   => 'NGG Gallery name'),
    'id'      => array('type'    => 'text',
                       'label'   => 'CSS ID'),
    'class'   => array('type'    => 'text',
                       'label'   => 'CSS Class'),
  );

  function __construct() {
    $widget_ops = array('classname' => 'tn_ngg_slider_widget',
                        'description' => __('Use this widget to add a NGG Gallery Slider', 'roots'));

    $this->WP_Widget('tn_ngg_slider_widget', __('TN: NGG Gallery Slider', 'roots'), $widget_ops);
    $this->alt_option_name = 'tn_ngg_slider_widget';

    add_action('save_post',    array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('tn_ngg_slider_widget', 'widget');

    if (!is_array($cache)) {
      $cache = array();
    }

    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args, EXTR_SKIP);

    $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
    $show_title = empty($instance['show_title']) ? false : true;

    foreach($this->fields as $name => $label) {
      if (!isset($instance[$name])) { $instance[$name] = ''; }
    }
    $gallery = null;
    $images = array();
    $class = empty($instance['class']) ? 'tn-ngg-slider' : $instance['class'];
    $id = empty($instance['id']) ? 'carousel-noid-' . rand(1000, 2000) : $instance['id'];

    if (!empty($GLOBALS['nggdb'])) {
      $nggdb = $GLOBALS['nggdb'];
      $gallery = $nggdb->find_gallery($instance['gallery']);
      if (!empty($gallery->gid)) $images = $nggdb->get_gallery($gallery->gid);
    }

    if (!empty($gallery) && !empty($images)) {
      echo $before_widget;

      if ($show_title && !empty($title)) {
        echo $before_title, $title, $after_title;
      }

      include locate_template('/templates/widgets-tn-ngg-slider.php');

      echo $after_widget;
    }

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('tn_ngg_slider_widget', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['tn_ngg_slider_widget'])) {
      delete_option('tn_ngg_slider_widget');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('tn_ngg_slider_widget', 'widget');
  }

  function form($instance) {
    include locate_template('/lib/widgets-tn-settings.php');
  }
}
