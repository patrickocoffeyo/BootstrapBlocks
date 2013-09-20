Bootstrap Blocks

Bootstrap Blocks is an [Twitter Bootstrap](http://twitter.github.com/bootstrap), HTML5 BP base theme for Drupal 7.x. It has lots of goodies in it, like [Ico Moon](http://icomoon.io/), [Modernizr](http://modernizr.com/). Checkout [the project homepage!](http://basethe.me).

##Features
 - Bootstrap from Twitter
 - Clean, well organized, HTML5 base templates
 - Ico Moon Support
 - IE Edge and Chrome Frame (toggleable)
 - Social URL variable settings
 - HTML5 Boilerplate
 - Grunt script to handle all less and js processing
 - Cleaned up Drupal output
 - Organized folder structure to support large, scaleable, mantainable themes
 

##The Module
[Bootstrap Blocks Module](https://github.com/patrickocoffeyo/BootstrapBlocksModule) allows you to add custom Bootstrap-ized elements, like configurable Bootstrap menu blocks, navbars (including a nice Administration navbar) carousels from content types, and more. It's pretty much a staple for using this theme.

## Installation
Pretty easy stuff:

1. **Get the Files** - Download or clone the repository into Drupal's <code>sites/all/themes</code> directory.
2. **Install Grunt Requirements** - <code>cd</code> to the theme root and run <code>npm install</code>. This will install all the npm packages that Grunt needs to properly run.
3. **Enable and Set Default** - There are a couple ways to enable themes in Drupal:
 1. **Drush** If you have [Drush](http://drupal.org/project/drush) installed:
		1. Run <code>drush pm-enable BaseBuildingBlocks</code>
		2. … And then <code>drush vset theme_default BaseBuildingBlocks</code>
	2. **Administraion UI** - Navigate to <code>admin/appearance/list</code> and click "Enable and set default"

For more information on installing themes in Drupal, please visit the official [Theme Installation](http://drupal.org/node/456) documentation on drupal.org.

## Extension
This project is meant to be a base theme. You can take it and build a custom theme on it, or use it as a parent theme to your own theme.

## Contrubution
… is welcome and wanted. :) fork and contribute!

##License 
licensed under the [MIT License](http://en.wikipedia.org/wiki/MIT_License).

