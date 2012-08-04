<div class="row-fluid">
  <div class="span6">
		<h2>CSS Sweetness</h2>
		<p>Since Drupal has this awesome thing called "CSS and JS aggregation", it's ok to use multiple CSS files in your themes, which is great for organization, especially when writing a theme for a large web application.</p>
		
		<p>Base Building Blocks makes use of that and organizes the CSS by Blocks, Pages, and Layouts. This makes it super easy to manage the css of larger Drupal websites.</p>
		
		<ul>
			<li><code>blocks.css</code> - Styles for sitewide blocks (Such as the search form block, login block, etc).</li>
			<li><code>layout.css</code> - Main layout styling. Positioning of sitewide regions, containers, headers, logos, etc.</li>
			<li><code>pages.css</code> - Page specific styling for page-type fields, and views.</li>
			<li><code>drupal.css</code> - A little clean up work and a few styles for drupal-generated elements. </li>
			<li><code>bootstrap-responsive.css</code> - <a href="http://twitter.github.com/bootstrap/scaffolding.html#responsive">Responsive aspects of Twitter Bootstrap</a></li>
			<li><code>bootstrap.css</code> - <a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap.</a></li>
		</ul>
	</div>
	
	<div class="span6">
		<h2>LESSness</h2>
		<p>The .less files in /css/less are the less files that come with Twitter Bootstrap. When you make edits to these files (like variables.less) you'll need to re-compile the following files:</p>
		<code>responsive.less</code> to <code>responsive.css</code>
		<code>/css/less/bootstrap.less</code> to <code>/css/bootstrap.css</code>
                <p>You can also turn on/off certain parts of the Twitter Bootstrap library by commenting/uncommenting items in the <code>bootstrap.less</code> file. So, for instance, if have no need to the Bootstrap navbar, just comment out the <code>import "navbar.less";</code> line in <code>bootstrap.less</code>
		<p>Of course, every time you change a less file, you'll need to recompile. I use <a href="http://incident57.com/codekit/">CodeKit</a> to compile my less, it's a pretty chill app. :)</p>

		
	</div>
</div>

<div class="row-fluid">
	<div class="span6">
		<h2>Mobileness</h2>
		<p>Base Building Blocks makes use of <a href="http://twitter.github.com/bootstrap/">Bootstrap</a>, which means that right off the griddle your site will be responsive-able. It also includes Apple Touch Icons for iPhone, iPod Touch, and iPad (retina and non-retina).</p>
	</div>
	<div class="span6">
		<h2>Backwards Compatableness</h2>
		<p>Supporting old browsers may be a serious pain, but it's important! Base Building Blocks detects the old crotchety browsers, and adds IE7, IE8, and IE9 classes to the html tag so you can write your css to accomodate those old prunes.
	</div>
</div>

<div class="row-fluid">
	<div class="span6">
		<h2>Javascript</h2>
		<ul>
			<li>
				<h3>Twitter Bootstrap</h3>
				<p>Uncomment or comment the following lines in the <code>BaseBuildingBlocks.info</code> to turn on/off different parts of Twitter Bootstrap javascript library. By including only the js you need, you make your app lean and mean. :)</p>
				<ul>
					<li><code>scripts[] = js/bootstrap-alert.js</code></li>
					<li><code>scripts[] = js/bootstrap-button.js</code></li>
					<li><code>scripts[] = js/bootstrap-carousel.js</code></li>
					<li><code>scripts[] = js/bootstrap-collapse.js</code></li>
					<li><code>scripts[] = js/bootstrap-dropdown.js</code></li>
					<li><code>scripts[] = js/bootstrap-modal.js</code></li>
					<li><code>scripts[] = js/bootstrap-popover.js</code></li>
					<li><code>scripts[] = js/bootstrap-scrollspy.js</code></li>
					<li><code>scripts[] = js/bootstrap-tab.js</code></li>
					<li><code>scripts[] = js/bootstrap-tooltip.js</code></li>
					<li><code>scripts[] = js/bootstrap-transition.js</code></li>
				</ul>
			</li>
			<li>
				<h3>Modernizr</h3>
				<p><a href="http://modernizr.com/">Modernizr</a> runs quickly on page load to detect features; it then creates a JavaScript object with the results, and adds classes to the html element for you to key your CSS on. </p>
			</li>
		</ul>
	</div>
	
	<div class="span6">
		<h2>Template.php</h2>
		<p>Base Building Blocks adds a function to the template.php theme file that allows you to use node-type based page templates, like <code>page--node-type.tpl.php</code>. Drupal doesn't normally allow you to do this, but when theming a large application, this can be VERY usefull.</p>
		<p>The temple.php also includes a large collection of functions to bootstrap-ize drupal elements, such as menus, pagers, messages, tabs, tables, and many more. It may seem like a small feature, but it makes Base Building Blocks into an AWESOME administration theme.</p>
		</ul>
	</div>
</div>