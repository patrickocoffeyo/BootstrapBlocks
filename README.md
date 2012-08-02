#Base Building Blocks#
Base Building Blocks is a base theme for Drupal 7.x. It allows you to quickly and efficiently rip out excellent custom themes, making use of the best front-end technologies today has to offer, such as Twitter Bootstrap, Modernizr, responsive layout, etc.

##CSS##
Since Drupal has this awesome thing called "CSS and JS aggregation", it's ok to use multiple CSS files in your themes, which is great for organization, especially when writing a theme for a large web application. 

I have organized my CSS by Blocks, Pages, and Layouts, since that's kind of the system Drupal provides for us.

* **blocks.css** - Styles for sitewide blocks (Such as the search form block, login block, etc).
* **layout.css** - Main layout styling. Positioning of sitewide regions, containers, headers, logos, etc.
* **pages.css** - Page specific styling for page-type fields, and views.
* **drupal.css** - A little clean up work and a few styles for drupal-generated elements. 
* **bootstrap-responsive.css** - <a href="http://twitter.github.com/bootstrap/scaffolding.html#responsive">Responsive aspects of Twitter Bootstrap</a>
* **bootstrap.css** - <a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap.</a>

##LESS##
The .less files in /css/less are the less files that come with Twitter Bootstrap. When you make edits to these files (like variables.less) you'll need to re-compile the following files:

* /css/less/responsive.less **to** /css/responsive.css 
* /css/less/bootstrap.less **to** /css/bootstrap.css

I use <A href="http://incident57.com/codekit/">CodeKit</a> to do this, it's a pretty chill app.

##Javascript##
* **Twitter Bootstrap**
  - Uncomment or comment the following lines to turn on/off different parts of Twitter Bootstrap
     - #scripts[] = js/bootstrap-alert.js
     - #scripts[] = js/bootstrap-button.js
     - #scripts[] = js/bootstrap-carousel.js
     - #scripts[] = js/bootstrap-collapse.js
     - #scripts[] = js/bootstrap-dropdown.js
     - #scripts[] = js/bootstrap-modal.js
     - #scripts[] = js/bootstrap-popover.js
     - #scripts[] = js/bootstrap-scrollspy.js
     - #scripts[] = js/bootstrap-tab.js
     - #scripts[] = js/bootstrap-tooltip.js
     - #scripts[] = js/bootstrap-transition.js

* **Modernizr**
  - http://modernizr.com

##Template.php##
* Adds a function that allows you to use node-type based page templates. (page--node-type.tpl.php).
* Functions to bootstrap-ize drupal ellements. 


