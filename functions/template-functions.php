<?php
include('menus.inc');
include('buttons.inc');
include('pagers.inc');
include('forms.inc');
include('messages.inc');
include('tables.inc');

/*
 * Return Header Scripts
 * @return
 *   Dom for scripts added. By default, adds jQuery jQuery 1.9.1 in no conflict mode
 */
function BootstrapBlocks_scripts() {
  $js = '<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>' . "\n";
  $js .= '<script>window.jQuery2 = jQuery.noConflict();</script>' . "\n";
  return $js;
}

/*
 * Return Footer Scripts
 * @return
 *   Scripts added in the theme setting footer_scripts
 */
function BootstrapBlocks_footer_scripts() {
  if (theme_get_setting('footer_scripts')) {
    return '<script>'. theme_get_setting('footer_scripts') . '</script>';
  }
  return NULL;
}

/*
 * Return touch icons
 * @return
 *   Apple Touch Icons in all the right sizes.
 */
function BootstrapBlocks_touch_icons() {
  $path = '/'.drupal_get_path('theme', 'BootstrapBlocks').'/assets/img/icons/';
  $output = '<link rel="apple-touch-icon-precomposed" href="' . $path . 'touch-icon-iphone.png" />' . "\n";
  $output .= '<link rel="apple-touch-icon-precomposed" href="' . $path . 'touch-icon-iphone.png" />' . "\n";
  $output .= '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . $path . 'touch-icon-ipad.png" />' . "\n";
  $output .= '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . $path . 'touch-icon-iphone4.png" />' . "\n";
  $output .= '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . $path . 'touch-icon-ipad3.png" />' . "\n";
  return $output;
}

/*
 * Return Author Link
 * @return
 *   Link tag for the Google+ author that owns the site
 */
function BootstrapBlocks_author() {
  if (theme_get_setting('author_id')) {
    return '<link rel="author" href="https://plus.google.com/'.theme_get_setting('author_id').'">';
  }
  return NULL;
}
