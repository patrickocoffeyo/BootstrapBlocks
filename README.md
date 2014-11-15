#Bootstrap Blocks
[![Gitter](https://badges.gitter.im/Join Chat.svg)](https://gitter.im/patrickocoffeyo/BootstrapBlocks?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Bootstrap Blocks is a [Bootstrap-based](http://twitter.github.com/bootstrap), HTML5 BP base theme for Drupal 7.x. Includes lots of goodies, like [Icomoon](http://icomoon.io/), and [Modernizr](http://modernizr.com/).

##Features
 - Bootstrap integration
 - Clean HTML5 templates
 - Icomoon Support
 - HTML5 Boilerplate
 - Grunt
 - Cleaned Drupal output
 - Organized, easy to understand folder structure
 - Cool <code>drush make</code> file: [bootstrapblocks.make](https://gist.github.com/patrickocoffeyo/9627418)


##The Module
[Bootstrap Blocks Module](https://github.com/patrickocoffeyo/BootstrapBlocksModule) allows you to add custom Bootstrap-ized elements, like configurable Bootstrap menu blocks, navbars (including a nice Administration navbar) carousels from content types, and more. It's pretty much a staple for using this theme.

## Installation
Pretty easy stuff:

1. **Get the Files** - Download or clone the repository into Drupal's <code>sites/all/themes</code> directory. Or, just use <code>drush make</code> with the [bootstrapblocks.make](https://gist.github.com/patrickocoffeyo/9627418) file.
2. **Install jQuery Update** - <code>drush en jquery_update -y</code>, or download and install the [jQuery Update](https://drupal.org/project/jquery_update) module manually.
3. **Install Grunt Requirements** - <code>cd</code> to the theme root and run <code>npm install</code>. This will install all the npm packages that Grunt needs to properly run.
4. **Enable and Set Default** - There are a couple ways to enable themes in Drupal:
  1. **Drush** If you have [Drush](http://drupal.org/project/drush) installed, run <code>drush pm-enable BootstrapBlocks && drush vset theme_default BootstrapBlocks</code>
  2. **Administraion UI** - Navigate to <code>admin/appearance/list</code> and click "Enable and set default"

For more information on installing themes in Drupal, please visit the official [Theme Installation](http://drupal.org/node/456) documentation on drupal.org.

## Extension
This project is meant to be a base theme. You can take it and build a custom theme on it, or use it as a parent theme to your own theme.

## Contrubution
… is welcome and wanted. :) fork and contribute!

##License
licensed under the [MIT License](http://en.wikipedia.org/wiki/MIT_License).
