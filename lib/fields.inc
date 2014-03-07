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
  $collapsible = in_array('collapsible', $element['#attributes']['class']);
  $collapsed = in_array('collapsed', $element['#attributes']['class']);

  //panel classes
  element_set_attributes($element, array('id'));
  _form_set_class($element, array('form-wrapper', 'panel', 'panel-default'));

  //panel-body classes
  $panel_body = array('class' => array('fieldset-wrapper', 'panel-body'));
  if ($collapsible == TRUE) { $panel_body['class'][] = 'collapse'; }
  if (!$collapsed) { $panel_body['class'][] = 'in'; }


  //panel
  $output = '<fieldset' . drupal_attributes($element['#attributes']) . '>';

  //panel-heading
  if (!empty($element['#title'])) {
    $output .= '<div class="panel-heading"><h4 class="panel-title">';

    if ($collapsible) {
      $output .= '<a data-toggle="collapse" href="#' . $element['#attributes']['id'] . ' .panel-body">' . $element['#title'] . '</a>';
    } else {
      $output .= $element['#title'];
    }

    $output .= '</h4></div>';
  }

  //panel-body
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
