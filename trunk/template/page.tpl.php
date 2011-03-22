<?php
// $Id: page.tpl.php,v 0.8.2.3 2010/12/21 15:30:04 Dmitry Tretyakov Exp $
/**
 * @file
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It should be placed within the <body> tag. When selecting through CSS
 *   it's recommended that you use the body tag, e.g., "body.front". It can be
 *   manipulated through the variable $classes_array from preprocess functions.
 *   The default values can be one or more of the following:
 *   - front: Page is the home page.
 *   - not-front: Page is not the home page.
 *   - logged-in: The current viewer is logged in.
 *   - not-logged-in: The current viewer is not logged in.
 *   - node-type-[node type]: When viewing a single node, the type of that node.
 *     For example, if the node is a "Blog entry" it would result in "node-type-blog".
 *     Note that the machine name will often be in a short form of the human readable label.
 *   - page-views: Page content is generated from Views. Note: a Views block
 *     will not cause this class to appear.
 *   - page-panels: Page content is generated from Panels. Note: a Panels block
 *     will not cause this class to appear.
 *   The following only apply with the default 'sidebar_first' and 'sidebar_second' block regions:
 *     - two-sidebars: When both sidebars have content.
 *     - no-sidebars: When no sidebar content exists.
 *     - one-sidebar and sidebar-first or sidebar-second: A combination of the
 *       two classes when only one of the two sidebars have content.
 * - $node: Full node object. Contains data that may not be safe. This is only
 *   available if the current page is on the node's primary url.
 * - $menu_item: (array) A page's menu item. This is only available if the
 *   current page is in the menu.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing the Primary menu links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title: The page title, for use in the actual HTML content.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the
 *   view and edit tabs when displaying a node).
 * - $help: Dynamic help text, mostly for admin pages.
 * - $content: The main content of the current page.
 * - $feed_icons: A string of all feed icons for the current page.
 *
 * Footer/closing data:
 * - $footer_message: The footer message as defined in the admin settings.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * Regions:
 * - $content_top: Items to appear above the main content of the current page.
 * - $content_bottom: Items to appear below the main content of the current page.
 * - $navigation: Items for the navigation bar.
 * - $sidebar_first: Items for the first sidebar.
 * - $sidebar_second: Items for the second sidebar.
 * - $header: Items for the header region.
 * - $footer: Items for the footer region.
 * - $page_closure: Items to appear below the footer.
 *
 * The following variables are deprecated and will be removed in Drupal 7:
 * - $body_classes: This variable has been renamed $classes in Drupal 7.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess()
 * @see zen_process()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>">
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<base href="http://deticenter.org<?php print $base_path.$directory;?>/" />
<meta name="description" content="Санкт-Петербургская общественная благотворительная организация
      Детский Кризисный центр" />
<meta name="keywords" content="Детский кризисный центр, дети, психологическая помощь, телефон доверия, волонтеры,
      трудные подростки, Санкт-Петербург, благотворительная организация, СПб, помощь семьям, трудная ситуация" />
<meta name="robots" content="index,follow" />

<!-- Yandex Verification -->
<meta name='yandex-verification' content='4057d7a60a9deabc' />

<!-- YAHOO! Verification code -->
<meta name="y_key" content="c9eec32fd4c5e92c" />
<?php
	if(!$is_front) {
		print $styles;
		print $scripts;
	}
	?>
<script type="text/javascript" src="/sites/all/themes/dkcenter/js/iexplorer.js"></script>
<?php if ($is_front): ?>
<meta name="canonical" content="/" />
<link type="text/css" rel="stylesheet" media="all" href="/sites/all/themes/dkcenter/css/style.css" />
<link type="text/css" rel="stylesheet" media="print" href="/sites/all/themes/dkcenter/css/print.css?B" />
<script type="text/javascript" src="/sites/all/themes/dkcenter/js/jquery.js"></script>
<script type="text/javascript" src="/sites/all/themes/dkcenter/js/s3Slider.js"></script>
<script type="text/javascript">
	 $(document).ready(function() {
		 $('#slider').s3Slider({
			 timeOut: 4000
		 });
	 });
</script>
<?php endif; ?>

<!-- Google Analytics -->
<meta name="google-site-verification" content="QzUTXZnJUKywUVm21tt2oK6294tRRsi9zv13MMXlj0M" />

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-12216393-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<?php print $header_image; ?>

<!-- Main Horizontal menu -->
	<?php if ($menu_region): ?>
		<div class="menu">
			<?php print $menu_region; ?>
		</div>
	<?php endif; ?>

<?php  // FRONTPAGE DATA ONLY
if ($is_front):
?>
<!-- Logotype and main site header -->
<div class="header">
	<div id="mainHeaderContainer">
    <a href="http://deticenter.org" title="<?php print t('Home'); ?>" rel="home" id="logo">
     <img class="logotype" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
    </a>
    <p id="upheader"><?php print $site_slogan; ?></p>
    <h1><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
		<?php print $site_name; ?></a></h1>
	</div>

  <div class="subNav">
    <?php print $site_header; ?></div>
  </div>

<!-- Left column container -->
<div class="contents">
	<div class="projectsContainer">
  	<?php print $content_left; ?>
  </div>

<!-- Right column container -->
	<div class="meltedContentsContainer">
	<?php print $content_right; ?>
	</div>

<?php if ($content_news): ?>
<!-- News container -->
<div class="newsContentsContainer">
	<hr id="mainPageLine" />
	<img id="sunImage" src="images/sunImage.png" alt="#" />
	<div class="newsWrapper">
		<?php print $content_news; ?>
	</div>

	<img src="images/children.png" alt="#" />
</div>
<?php endif; ?>

</div>

<?php
/*
 * End of front page
 */
endif; ?>

<?php  // NO FRONT PAGE
if(!$is_front):
?>
<div class="header">
 <div id="mainHeader">
  <h1><?php print $node->field_section[0]['safe']; ?></h1>
 </div>

 <div class="subNav">
 <?php print $site_header; ?></div>
</div>


<div class="contents">
  <div class="mainContentsColumnContainer">
  	<div class="sidebarColumnContainer">

    		<!-- Панель с навигацией слева -->
				<div class="sidebar">
				<?php print $sidebar; ?>
				</div>

  	<div class="mainContents">
   <?php print $content; ?>
   </div>
  </div>
</div>
</div>

<?php endif; ?>
<?php
// FOOTER
if ($site_footer):
?>
<div class="footer">
 <hr />
 <div class="footerContents">
	<div class="leftWrapper">
	</div>

   <!-- Yandex.Metrika counter -->
<div style="display:none;"><script type="text/javascript">
(function(w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter4886170 = new Ya.Metrika(4886170);
             yaCounter4886170.clickmap(true);
             yaCounter4886170.trackLinks(true);

        } catch(e) { }
    });
})(window, 'yandex_metrika_callbacks');
</script></div>
<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
<noscript><img src="//mc.yandex.ru/watch/4886170" style="position:absolute; left:-9999px;" alt="" /></noscript>
<!-- /Yandex.Metrika counter -->

<!-- Mail.ru Counter :( -->
<div class="mailru">
<script type="text/javascript">//<![CDATA[
var a='';js=10;d=document;
try{a+=';r='+escape(d.referrer);}catch(e){}try{a+=';j='+navigator.javaEnabled();js=11;}catch(e){}
try{s=screen;a+=';s='+s.width+'*'+s.height;a+=';d='+(s.colorDepth?s.colorDepth:s.pixelDepth);js=12;}catch(e){}
try{if(typeof((new Array).push('t'))==="number")js=13;}catch(e){}
try{d.write('<a href="http://top.mail.ru/jump?from=2001192"><img src="http://d9.c8.be.a1.top.mail.ru/counter?id=2001192;t=95;js='+js+
a+';rand='+Math.random()+'" alt="Рейтинг@Mail.ru" style="border:0;" height="18" width="88" \/><\/a>');}catch(e){}//]]></script>
<noscript><p><a href="http://top.mail.ru/jump?from=2001192"><img src="http://d9.c8.be.a1.top.mail.ru/counter?js=na;id=2001192;t=95"
style="border:0;" height="18" width="88" alt="Рейтинг@Mail.ru" /></a></p></noscript>
<!-- //Rating@Mail.ru counter -->
</div>

	<div class="copyright">
	 <p class="footerNav">&copy;&nbsp;ДЕТСКИЙ КРИЗИСНЫЙ ЦЕНТР, г. САНКТ-ПЕТЕРБУРГ</p>
	</div>

	<div class="rightWrapper">
	 <p class="footerNav"><a href="/sitemap.xml" title="Карта сайта">КАРТА САЙТА</a></p>
	 <p class="footerNav"><a href="/contacts/contacts.html" title="Наши контакты">КОНТАКТЫ</a></p>
	</div>
 </div>
</div>

<?php endif; ?>
<?php print $page_closure; ?>
<?php print $closure; ?>
</body>
</html>