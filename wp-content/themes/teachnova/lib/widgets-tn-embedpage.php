<?php
/**
 * Teachnova Embed page, using Bootstrap
 */
class TN_Embed_Page_Widget extends WP_Widget {
  private $fields = array(
    'title'   => array('type'    => 'text',
                       'label'   => 'Title'),
    'show_title' => array('type' => 'checkbox',
                       'label'   => 'Display title before page'),
    'page'    => array('type'    => 'select',
                       'label'   => 'Page',
                       'default' => 0,
                       'options' => 'pages_get'),
    'id'      => array('type'    => 'text',
                       'label'   => 'CSS ID'),
    'class'   => array('type'    => 'text',
                       'label'   => 'CSS Class'),
  );

  function __construct() {
    $widget_ops = array('classname' => 'tn_embedpage_widget',
                        'description' => __('Use this widget to embed a page', 'roots'));

    $this->WP_Widget('tn_embedpage_widget', __('TN: Embed Page', 'roots'), $widget_ops);
    $this->alt_option_name = 'tn_embedpage_widget';

    add_action('save_post',    array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('tn_embedpage_widget', 'widget');

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
    $page = null;
    $page_title = '';
    $page_content = '';
    $page_thumb = false;

    $pageid = $instance['page'];
    $class = empty($instance['class']) ? 'tn-embedpage' : $instance['class'];
    $id = empty($instance['id']) ? '' : $instance['id'];

    $page = get_post($pageid);
    if (!empty($page)) {
      echo $before_widget;

      if ($show_title && !empty($title)) {
        echo $before_title, $title, $after_title;
      }

      include locate_template('/templates/widgets-tn-embedpage.php');

      echo $after_widget;
    }

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('tn_embedpage_widget', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['tn_embedpage_widget'])) {
      delete_option('tn_embedpage_widget');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('tn_embedpage_widget', 'widget');
  }

  function form($instance) {
    include locate_template('/lib/widgets-tn-settings.php');
  }

  function pages_get() {
    $pagelist = array();
    $pages = get_pages();
    foreach($pages as $page) {
      $pagelist[$page->ID] = $page->post_title;
    }
    return $pagelist;
  }
}
