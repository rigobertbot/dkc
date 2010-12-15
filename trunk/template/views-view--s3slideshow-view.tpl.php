<?php
// $Id: views-view--s3slideshow-view.tpl.php,v 0.13.2.2 2010/12/15 04:25:28 Talbot Exp $
/**
 * @file views-view.tpl.php
 * Main view template
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 * - $admin_links: A rendered list of administrative links
 * - $admin_links_raw: A list of administrative links suitable for theme('links')
 *
 * @ingroup views_templates
 */
?>
<?php /* Слайдшоу на яваскрипте */ ?>

<div class="mainImage" id="slideshowIndex">
	<div id="slider">
		<ul id="sliderContent">
  	<?php if ($rows): ?>
      <?php print $rows; ?>
  	<?php elseif ($empty): ?>
      <?php print $empty; ?>
  	<?php endif; ?>
  	<li>
			<div class="clear sliderImage"></div>
		</li>
  	</ul>
	</div>
</div>

<?php /* class view */ ?>
