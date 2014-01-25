<?php
/**
 * @file
 * Overrides container classes/markup
 */

/**
 * Overriding theme_container()
 */
function BootstrapBlocks_container($variables) {
  $element = $variables['element'];

  if (isset($element['#array_parents'])) {
    if (!isset($element['#attributes']['id'])) {
      $element['#attributes']['id'] = $element['#id'];
    }

    $element['#attributes']['class'][] = 'form-wrapper';
    $element['#attributes']['class'][] = 'form-group';
  }

  return '<div' . drupal_attributes($element['#attributes']) . '>' . $element['#children'] . '</div>';
}
