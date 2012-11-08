<?php
/**
 * Implements hook_form_FORM_ID_alter().
 */
function BaseBuildingBlocks_form_system_theme_settings_alter(&$form, $form_state) {
  $form['chrome_frame'] = array( 
    '#type' => 'fieldset',
    '#title' => 'IE Compatability',
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
  
  $form['menu'] = array( 
    '#type' => 'fieldset',
    '#title' => 'Menu Settings',
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#required' => TRUE,
    '#weight' => -30,
  );
  $form['menu']['admin_menu_on_off'] = array(
    '#type' => 'checkbox',
    '#title' => t('Management Menu'),
    '#description' => t('Enables a nice administration menu for admins. You can always edit the items in this menu by going to the menu  administration page and editing the "Management" menu.'),
    '#default_value' => theme_get_setting('admin_menu_on_off'),
  );
  $form['menu']['mobile_menu_on_off'] = array(
    '#type' => 'checkbox',
    '#title' => t('Mobile Menu'),
    '#description' => t('Base Building Blocks includes a collection of functions that allow you to print menus easily. One of the menus you can print out is a select list for mobile devices. By default Base Building Blocks includes a function in the template.php/preprocess function that adds a mobile select menu for the main menu. You can easily add any menu you want but just adding your own custom variable in template.php like so: <code>$vars["mobile_select_menu"] = BaseBuildingBlocks_build_select_menu("main-menu");</code>'),
    '#default_value' => theme_get_setting('mobile_menu_on_off'),
  );
  $form['menu']['menu_icons'] = array(
    '#type' => 'textarea',
    '#title' => t('Menu Icons'),
    '#description' => t('Determines what <a href="http://fortawesome.github.com/Font-Awesome/"> Font Awesome</a> icon should be printed before each menu item in the Base Building Blocks menu functions based off of the menu items title. (For example: My Menu Link Title | icon-font-awesome-preset)'),
    '#default_value' => theme_get_setting('menu_icons'),
  );
  $form['buttons'] = array(
    '#type' => 'fieldset',
    '#title' => t('Button Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#weight' => -40,
  );
  $form['buttons']['buttons_classes'] = array(
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
    '#default_value' => theme_get_setting('twitter_handle'),
  );
  $form['seo']['social']['facebook_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook Link'),
    '#description' => t('Full URL to Fabebook account belonging to site.'),
    '#default_value' => theme_get_setting('facebook_link'),
  );
  $form['seo']['social']['youtube'] = array(
    '#type' => 'textfield',
    '#title' => t('Youtube Link'),
    '#description' => t('Full URL to Youtube account belonging to site.'),
    '#default_value' => theme_get_setting('youtube_link'),
  );
  $form['seo']['social']['linkedin'] = array(
    '#type' => 'textfield',
    '#title' => t('LinkedIn Link'),
    '#description' => t('Full URL to LinkedIn account belonging to site.'),
    '#default_value' => theme_get_setting('linkedin_link'),
  );
  $form['seo']['social']['google+'] = array(
    '#type' => 'textfield',
    '#title' => t('Google+ Link'),
    '#description' => t('Full URL to Google+ account belonging to site.'),
    '#default_value' => theme_get_setting('google+_link'),
  );
  return $form;
}
