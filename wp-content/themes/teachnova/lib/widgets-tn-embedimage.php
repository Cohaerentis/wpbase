<?php
/**
 * Teachnova Embed image
 */
class TN_Embed_Image_Widget extends WP_Widget {
  private $fields = array(
    'title'   => array('type'    => 'text',
                       'label'   => 'Title'),
    'show_title' => array('type' => 'checkbox',
                       'label'   => 'Display title before page'),
    'src'     => array('type'    => 'text',
                       'label'   => 'Image source URL'),
    'alt'     => array('type'    => 'text',
                       'label'   => 'Image alternative text'),
    'id'      => array('type'    => 'text',
                       'label'   => 'CSS ID'),
    'class'   => array('type'    => 'text',
                       'label'   => 'CSS Class'),
  );

  function __construct() {
    $widget_ops = array('classname' => 'tn_embedimage_widget',
                        'description' => __('Use this widget to embed a image', 'roots'));

    $this->WP_Widget('tn_embedimage_widget', __('TN: Embed Image', 'roots'), $widget_ops);
    $this->alt_option_name = 'tn_embedimage_widget';

    add_action('save_post',    array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('tn_embedimage_widget', 'widget');

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

    $class = empty($instance['class']) ? 'tn-embedimage' : $instance['class'];

    if (!empty($instance['src'])) {
      echo $before_widget;

      if ($show_title && !empty($title)) {
        echo $before_title, $title, $after_title;
      }

      include locate_template('/templates/widgets-tn-embedimage.php');

      echo $after_widget;
    }

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('tn_embedimage_widget', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['tn_embedimage_widget'])) {
      delete_option('tn_embedimage_widget');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('tn_embedimage_widget', 'widget');
  }

  function form($instance) {
    include locate_template('/lib/widgets-tn-settings.php');
  }
}
