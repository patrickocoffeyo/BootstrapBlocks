<?php
/**
 * Implements hook_form_FORM_ID_alter().
 */
function BaseBuildingBlocks_form_system_theme_settings_alter(&$form, $form_state) {
  
  $form['chrome_frame'] = array( 
    '#type' => 'fieldset',
    '#title' => 'IE Compatability',
    '#collapsible' => TRUE,
    '#required' => TRUE,
    '#weight' => -20,
  );
  $form['chrome_frame']['chrome_frame_on_off'] = array(
    '#type' => 'checkbox',
    '#title' => t('Edge and Chrome Frame Meta Tag'),
    '#description' => t('Forces Edge and Chrome Frame on IE if enabled.'),
    '#default_value' => theme_get_setting('chrome_frame_on_off'),
  );
  
  $form['admin'] = array( 
    '#type' => 'fieldset',
    '#title' => 'Management Menu',
    '#collapsible' => TRUE,
    '#required' => TRUE,
    '#weight' => -20,
  );
  $form['admin']['admin_menu_on_off'] = array(
    '#type' => 'checkbox',
    '#title' => t('Management Menu'),
    '#description' => t('Enables a nice administration menu for admins. You can always edit the items in this menu by going to the menu  administration page and editing the "Management" menu.'),
    '#default_value' => theme_get_setting('admin_menu_on_off'),
  );
  
  return $form;
}