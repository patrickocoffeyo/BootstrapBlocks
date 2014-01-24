<?php
/**
 * @file
 * Modifies markup for fields and fieldsets
 */

/**
 * Process fieldset element.
 */

function BootstrapBlocks_fieldset($variables) {
  $element = $variables['element'];

  element_set_attributes($element, array('id'));
  _form_set_class($element, array('form-wrapper', 'panel', 'panel-default'));

  $output = '<fieldset' . drupal_attributes($element['#attributes']) . '>';
  if (!empty($element['#title'])) {
    // Always wrap fieldset legends in a SPAN for CSS positioning.
    $output .= '<div class="panel-heading"><span class="fieldset-legend">' . $element['#title'] . '</span></div>';
  }

  $output .= '<div class="fieldset-wrapper panel-body">';
  if (!empty($element['#description'])) {
    $output .= '<div class="fieldset-description">' . $element['#description'] . '</div>';
  }

  $output .= $element['#children'];
  if (isset($element['#value'])) {
    $output .= $element['#value'];
  }

  $output .= '</div>';
  $output .= "</fieldset>\n";
  return $output;
}
