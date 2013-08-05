<?php
/**
 * @file
 * Modifies button markup
 */

/**
 * Implimenting hook_preprocess_button()
 */
function BootstrapBlocks_preprocess_button(&$vars) {
  $button_title = $vars['element']['#value'];

  $vars['element']['#attributes']['class'][] = 'btn btn-default ' . BootstrapBlocks_get_button_class($button_title);
}

/**
 * Implimenting hook_preprocess_image_button()
 * Bootstrapping Image Button
 */
function BootstrapBlocks_preprocess_image_button(&$vars) {
  $button_title = $vars['element']['#value'];

  $vars['element']['#attributes']['class'][] = 'btn btn-default ' . BootstrapBlocks_get_button_class($button_title);
}
 
/**
 * Returns a class from template settings from button title()
 * @param $button_title
 *   Title of the button to grab the class for
 * @return
 *   String containing class for an element of type <input>, <button>, or <a>
 *
 * Impliments theme_get_setting('button_classes');
 * Impliments list_extract_allowed_values() from the field_list module
 */
function BootstrapBlocks_get_button_class($button_title) {
  $button_classes = theme_get_setting('button_classes');
  $array = list_extract_allowed_values($button_classes, 'list_text', FALSE);

  $class = '';
  if (isset($array[$button_title])) {
    $class = $array[$button_title];
  }

  return $class;
}
