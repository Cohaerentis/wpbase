<?php foreach($this->fields as $name => $config) :
  if (empty($config['label'])) continue;

  if (isset($instance[$name]))            { $value = esc_attr($instance[$name]); }
  else if (!empty($config['default']))    { $value = $config['default']; }
  else                                    { $value = ''; }

  $type = empty($config['type']) ? 'text' : $config['type'];

  $label = $config['label'];
  switch ($type) {
    case 'text':
      break;

    case 'number':
      $size = (empty($config['size'])) ? '3' : $config['size'];
      break;

    case 'select':
      $options = $config['options'];
      if (is_string($options) && is_callable(array($this, $options)))
        $options = $this->$options();
      else if (is_string($options) && is_callable($options))
        $options = $options();
      break;

    case 'checkbox':
      break;
  }
?>
  <?php if ($type == 'text') : ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id($name)); ?>">
        <?php _e("{$label}:", 'roots'); ?>
      </label>
      <input class="widefat"
             id="<?php echo esc_attr($this->get_field_id($name)); ?>"
             name="<?php echo esc_attr($this->get_field_name($name)); ?>"
             type="text"
             value="<?php echo $value; ?>">
    </p>
  <?php elseif ($type == 'number') : ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id($name)); ?>">
        <?php _e("{$label}:", 'roots'); ?>
      </label>
      <input size="<?php echo $size; ?>"
             id="<?php echo esc_attr($this->get_field_id($name)); ?>"
             name="<?php echo esc_attr($this->get_field_name($name)); ?>"
             type="text"
             value="<?php echo $value; ?>">
    </p>
  <?php elseif ($type == 'select') : if (!is_array($options) || empty($options)) continue; ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id($name)); ?>">
        <?php _e("{$label}:", 'roots'); ?>
      </label>
      <select class="widefat"
             id="<?php echo esc_attr($this->get_field_id($name)); ?>"
             name="<?php echo esc_attr($this->get_field_name($name)); ?>">
      <?php foreach ($options as $key => $option) : ?>
        <option value="<?php echo $key; ?>"
          <?php if ($key == $value) echo 'selected="selected"'; ?> >
          <?php echo $option; ?>
        </option>
      <?php endforeach; ?>
      </select>
    </p>
  <?php elseif ($type == 'checkbox') : ?>
    <p>
      <input id="<?php echo esc_attr($this->get_field_id($name)); ?>"
             name="<?php echo esc_attr($this->get_field_name($name)); ?>"
             type="checkbox"
             <?php if (!empty($value)) : ?>checked="checked"<?php endif; ?> >
      <label for="<?php echo esc_attr($this->get_field_id($name)); ?>">
        <?php _e("{$label}", 'roots'); ?>
      </label>
    </p>
  <?php endif; ?>
<?php endforeach; ?>
