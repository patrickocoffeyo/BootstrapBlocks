<?php
/**
 * @file
 * Modifies form markup
 */

/**
 * Implimenting hook_form_alter()
 * Remove the wrapper from the form actions
 */
function BootstrapBlocks_form_alter(&$form, &$form_state, $form_id) {
  // Id's of forms that should be ignored
  $form_ids = array(
    'node_form',
    'system_site_information_settings',
    'user_profile_form',
  );

  if (isset($form['#form_id']) && !in_array($form['#form_id'], $form_ids) && !isset($form['#node_edit_form'])) {
    $form['actions']['#theme_wrappers'] = array();
  }

}


/**
 * Implimenting hook_form_element()
 */
function BootstrapBlocks_form_element(&$variables) {
  $ignore_ids = theme_get_setting('ignore_element_ids');
  $ignore_array = list_extract_allowed_values($ignore_ids, 'list_text', FALSE);

  $name = (isset($variables['element']['#name'])) ? $variables['element']['#name'] : '';

  if (!in_array($name, $ignore_array)) {
    $element = &$variables['element'];
    //This is also used in the installer, pre-database setup.
    $t = get_t();

    //This function is invoked as theme wrapper, but the rendered form element
    //may not necessarily have been processed by form_builder().
    $element += array(
      '#title_display' => 'before',
    );

    //Add element #id for #type 'item'.
    if (isset($element['#markup']) && !empty($element['#id'])) {
      $attributes['id'] = $element['#id'];
    }

    //Add bootstrap class
    $attributes['class'] = array('form-group');

    //Check for errors and set correct error class
    if (isset($element['#parents']) && form_get_error($element)) {
      $attributes['class'][] = 'error';
    }

    if (!empty($element['#type'])) {
      $attributes['class'][] = 'form-type-' . strtr($element['#type'], '_', '-');
    }

    if (!empty($element['#name'])) {
      $attributes['class'][] = 'form-item-' . strtr($element['#name'], array(' ' => '-', '_' => '-', '[' => '-', ']' => ''));
    }

    //Add a class for disabled elements to facilitate cross-browser styling.
    if (!empty($element['#attributes']['disabled'])) {
      $attributes['class'][] = 'form-disabled';
    }
    $output = '<div' . drupal_attributes($attributes) . '>' . "\n";

    //If #title is not set, we don't display any label or required marker.
    if (!isset($element['#title'])) {
      $element['#title_display'] = 'none';
    }

    $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
    $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';

    //Apply bootstrap classes appropriatly.
    $drupal_classes = array('form-text', 'form-controlarea', 'form-select');

    foreach ($drupal_classes as $class) {
      $element['#children'] = str_replace($class, $class.' form-control', $element['#children']);
    }

    switch ($element['#title_display']) {
      case 'before':
      case 'invisible':
        $output .= ' ' . theme('form_element_label', $variables);
        $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
        break;

      case 'after':
        $variables['#children'] = ' ' . $prefix . $element['#children'] . $suffix;
        $output .= ' ' . theme('form_element_label', $variables) . "\n";
        break;

      case 'none':
      case 'attribute':
        //Output no label and no required marker, only the children.
        $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
        break;
    }

    if ( !empty($element['#description']) ) {
      $output .= '<p class="help-block">' . $element['#description'] . "</p>\n";
    }

    $output .= "</div>\n";

    return $output;
  }
}


/**
 * Implimenting hook_form_element_label()
 */
function BootstrapBlocks_form_element_label(&$variables) {
  $element = $variables['element'];
  //This is also used in the installer, pre-database setup.
  $t = get_t();

  //If title and required marker are both empty, output no label.
  if ((!isset($element['#title']) || $element['#title'] === '') && empty($element['#required'])) {
    return '';
  }

  //If the element is required, a required marker is appended to the label.
  $required = !empty($element['#required']) ? theme('form_required_marker', array('element' => $element)) : '';

  $title = filter_xss_admin($element['#title']);

  $attributes = array();
  //Style the label as class option to display inline with the element.
  if ($element['#title_display'] == 'after') {
    $attributes['class'][] = 'option';
    $attributes['class'][] = $element['#type'];
  }
  //Show label only to screen readers to avoid disruption in flows.
  elseif ($element['#title_display'] == 'invisible') {
    $attributes['class'][] = 'element-invisible';
  }

  if (!empty($element['#id'])) {
    $attributes['for'] = $element['#id'];
  }

  $attributes['class'][] = 'control-label';

  $output = '';
  if ( isset($variables['#children']) ) {
    $output .= $variables['#children'];
  }

  $output .= $t('!title !required', array('!title' => $title, '!required' => $required));

  //The leading whitespace helps visually separate fields from inline labels.
  return ' <label' . drupal_attributes($attributes) . '>' . $output . "</label>\n";
}

/**
 * Overriding theme_progress_bar()
 */
function BootstrapBlocks_progress_bar($variables) {
  $variables['attributes']['class'][] = 'progress';
  $variables['attributes']['class'][] = 'progress-striped';

  return '<div'. drupal_attributes($variables['attributes']) .'><div class="bar" style="width: '. $variables['percent'] .'%;"></div></div>';
}
