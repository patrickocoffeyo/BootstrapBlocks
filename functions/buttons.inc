<?php
/**
 * @file
 * Base Building Blocks button management file
 */
 
/**
 * Implimenting hook_preprocess_button
 * Bootstrapping Buttons
 */
function BaseBuildingBlocks_preprocess_button(&$vars) {
  $button_title = $vars['element']['#value'];
  
  //Grab the bootstrap class from the theme settings
  $vars['element']['#attributes']['class'][] = 'btn ' . BaseBuildingBlocks_get_button_class($button_title);
}

/**
 * Implimenting hook_preprocess_image_button
 * Bootstrapping Image Button
 */
function BaseBuildingBlocks_preprocess_image_button(&$vars) {
  $button_title = $vars['element']['#value'];
  
  //Grab the bootstrap class from the theme settings
  $vars['element']['#attributes']['class'][] = 'btn ' . BaseBuildingBlocks_get_button_class($button_title);
}
 
/**
 * Returns a class from template settings from button title
 * @param $button_title
 *   Title of the button to grab the class for
 * @return
 *   String containing class for an element of type <input>, <button>, or <a>
 * 
 * Makes use of theme_get_setting('button_classes');
 * Makes use of list_extract_allowed_values() from the field_list module
 */
function BaseBuildingBlocks_get_button_class($button_title) {
  $button_classes = theme_get_setting('button_classes');
  $array = list_extract_allowed_values($button_classes, 'list_text', FALSE);
  
  if (isset($array[$button_title])) {
    $class = $array[$button_title];
  } 
  else {
    $class = '';
  }

  return $class;
}