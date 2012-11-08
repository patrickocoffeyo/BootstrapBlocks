<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $language->language; ?>"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $language->language; ?>"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="<?php echo $language->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $language->language; ?>" <?php echo $rdf_namespaces; ?>> <!--<![endif]-->
<head profile="<?php echo $grddl_profile; ?>">
  <?php echo $head; ?>
  <title><?php echo $head_title; ?></title>
  <?php echo $styles; ?>
  <?php echo BaseBuildingBlocks_scripts(); ?>
  <?php echo $scripts; ?>
  <?php echo BaseBuildingBlocks_touch_icons(); ?>
  <?php echo BaseBuildingBlocks_author(); ?>
</head>
<body class="<?php echo $classes; ?>" <?php echo $attributes;?>>
  <?php echo $page_top; ?>
  <?php echo $page; ?>
  <?php echo $page_bottom; ?>
  <?php echo BaseBuildingBlocks_footer_scripts(); ?>
</body>
</html>
