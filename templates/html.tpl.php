<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php print $language->language; ?>"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="<?php print $language->language; ?>"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="<?php print $language->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php print $language->language; ?>"> <!--<![endif]-->
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php global $theme_path; global $base_url; ?>
  <script type="text/javascript" src="<?php print $base_url . '/' . $theme_path; ?>/js/vendor/jquery-1.8.0.min.js"></script>
  <script type="text/javascript">
    var jq8 = jQuery.noConflict();
  </script>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <link rel="apple-touch-icon-precomposed" href="<?php print $theme_path; ?>/img/icons/mobile/touch-icon-iphone.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php print $theme_path; ?>/img/icons/mobile/touch-icon-ipad.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php print $theme_path; ?>/img/icons/mobile/touch-icon-iphone4.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php print $theme_path; ?>/img/icons/mobile/touch-icon-ipad3.png" />
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
