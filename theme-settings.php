<?php
/**
 * Implements hook_form_FORM_ID_alter().
 */
function BootstrapBlocks_form_system_theme_settings_alter(&$form, $form_state) {
  $form['forms'] = array( 
    '#type' => 'fieldset',
    '#title' => t('Forms'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#required' => TRUE,
    '#weight' => -20,
  );
  $form['forms']['ignore_element_ids'] = array(
    '#type' => 'textarea',
    '#title' => t('Ignore Forms Elements'),
    '#description' => t('Some form elements do not jive well with being bootstrap-ized. List all form IDs that should not be modified, separated by |. A default list is provided.'),
    '#default_value' => theme_get_setting('ignore_element_ids'),
  );
  $form['chrome_frame'] = array( 
    '#type' => 'fieldset',
    '#title' => t('IE Compatability'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#required' => TRUE,
    '#weight' => -20,
  );
  $form['chrome_frame']['chrome_frame_on_off'] = array(
    '#type' => 'checkbox',
    '#title' => t('Edge and Chrome Frame Meta Tag'),
    '#description' => t('Forces Edge and Chrome Frame on IE if enabled.'),
    '#default_value' => theme_get_setting('chrome_frame_on_off'),
  );
  $form['buttons'] = array(
    '#type' => 'fieldset',
    '#title' => t('Button Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#weight' => -40,
  );
  $form['buttons']['button_classes'] = array(
    '#type' => 'textarea',
    '#title' => t('Button Classes'),
    '#description' => t('Determines what bootstrap classes should be added to buttons based off of the button title. (For example: Button Title | btn-class)'),
    '#default_value' => theme_get_setting('button_classes'),
  );
  $form['seo'] = array( 
    '#type' => 'fieldset',
    '#title' => 'SEO and Social Settings',
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#required' => TRUE,
    '#weight' => -20,
  );
  $form['seo']['footer_scripts'] = array(
    '#type' => 'textarea',
    '#title' => t('Footer Scripts'),
    '#description' => t('Footer scripts for external services, such as Google Analytic tracking scripts, Online Chat Assistance scripts, etc. Do not add any script tags.'),
    '#default_value' => theme_get_setting('footer_scripts'),
  );
  $form['seo']['author_id'] = array(
    '#type' => 'textfield',
    '#title' => t('Google+ Author ID'),
    '#description' => t('Adds a rel="author" link to the head of your site.'),
    '#default_value' => theme_get_setting('author_id'),
  );
  $form['seo']['social'] = array( 
    '#type' => 'fieldset',
    '#title' => 'Social Links',
    '#description' => t('Links to social accounts related to the site. For use in your theming. (echo theme_get_setting("servicename_link");). These are not used by default in BBB, and you can add more in theme-settings.php.'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#required' => TRUE,
    '#weight' => -20,
  );
  $form['seo']['social']['twitter_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Twitter Link'),
    '#description' => t('Full URL to Twitter account belonging to site.'),
    '#default_value' => theme_get_setting('twitter_link'),
  );
  $form['seo']['social']['facebook_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook Link'),
    '#description' => t('Full URL to Fabebook account belonging to site.'),
    '#default_value' => theme_get_setting('facebook_link'),
  );
  $form['seo']['social']['youtube_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Youtube Link'),
    '#description' => t('Full URL to Youtube account belonging to site.'),
    '#default_value' => theme_get_setting('youtube_link'),
  );
  $form['seo']['social']['linkedin_link'] = array(
    '#type' => 'textfield',
    '#title' => t('LinkedIn Link'),
    '#description' => t('Full URL to LinkedIn account belonging to site.'),
    '#default_value' => theme_get_setting('linkedin_link'),
  );
  $form['seo']['social']['google+_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Google+ Link'),
    '#description' => t('Full URL to Google+ account belonging to site.'),
    '#default_value' => theme_get_setting('google+_link'),
  );
  return $form;
}
