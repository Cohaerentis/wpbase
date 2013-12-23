<?php foreach($this->fields as $name => $label) :
  ${$name} = isset($instance[$name]) ? esc_attr($instance[$name]) : '';
?>
  <p>
    <label for="<?php echo esc_attr($this->get_field_id($name)); ?>">
      <?php _e("{$label}:", 'roots'); ?>
    </label>
    <input class="widefat"
           id="<?php echo esc_attr($this->get_field_id($name)); ?>"
           name="<?php echo esc_attr($this->get_field_name($name)); ?>"
           type="text"
           value="<?php echo ${$name}; ?>">
  </p>
<?php endforeach; ?>
