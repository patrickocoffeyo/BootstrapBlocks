<?php
/**
 * @file
 * Modifies markup for fields, filters, and fieldsets
 */

/**
 * Process fieldset element.
 */

function BootstrapBlocks_fieldset($variables) {
  $element = $variables['element'];

  //panel classes
  element_set_attributes($element, array('id'));
  _form_set_class($element, array('form-wrapper', 'panel', 'panel-default'));

  //panel-body classes
  $panel_body = array('class' => array('fieldset-wrapper', 'panel-body'));
  if (in_array('collapsible', $element['#attributes']['class'])) { $panel_body['class'][] = 'collapse'; }
  if (!in_array('collapsed', $element['#attributes']['class'])) { $panel_body['class'][] = 'in'; }


  $output = '<fieldset' . drupal_attributes($element['#attributes']) . '>';

  if (!empty($element['#title'])) {
    $output .= '<div class="panel-heading"><h4 class="panel-title" data-toggle="collapse" data-target="#' . $element['#attributes']['id'] . ' .panel-body">' . $element['#title'] . '</h4></div>';
  }

  $output .= '<div' . drupal_attributes($panel_body) . '>';

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
