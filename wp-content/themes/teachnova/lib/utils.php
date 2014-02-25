<?php
/**
 * Utility functions
 */
function add_filters($tags, $function) {
  foreach($tags as $tag) {
    add_filter($tag, $function);
  }
}

function is_element_empty($element) {
  $element = trim($element);
  return empty($element) ? false : true;
}

function include_element($slug, $name = null, $data = array()) {
    $templates = array();
    $name = (string) $name;
    if ( '' !== $name )
        $templates[] = "{$slug}-{$name}.php";

    $templates[] = "{$slug}.php";

    $filename = locate_template($templates);

    if (!empty($filename)) {
        extract($data);
        include $filename;
    }
}

function roots_trim_characters($text, $maxlength, $more = '...') {
    $text = trim(strip_tags($text));
    $text = preg_replace('/\s+/', ' ', $text);
    $length = mb_strlen($text);

    if ($length <= $maxlength) return $text;

    return mb_substr($text, 0, $maxlength - mb_strlen($more)) . $more;
}