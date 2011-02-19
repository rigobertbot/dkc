<?php
// $Id: template.php,v 1.21 2009/08/12 04:25:15 johnalbin Exp $

/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can add new regions for block content, modify
 *   or override Drupal's theme functions, intercept or make additional
 *   variables available to your theme, and create custom PHP logic. For more
 *   information, please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to STARTERKIT_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: STARTERKIT_breadcrumb()
 *
 *   where STARTERKIT is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override any of the theme functions used in Zen core,
 *   you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_item_link()   in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and template suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440
 *   and http://drupal.org/node/190815#template-suggestions
 */


/**
 * Implementation of HOOK_theme().
 */
function dkcenter_theme(&$existing, $type, $theme, $path) {
  $hooks = zen_theme($existing, $type, $theme, $path);
  // Add your theme hooks like this:
  /*
  $hooks['hook_name_here'] = array( // Details go here );
  */
  // @TODO: Needs detailed comments. Patches welcome!
  return $hooks;
}

/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function */
function dkcenter_preprocess_page(&$vars, $hook) {
	$path_to_theme = drupal_get_path('theme', 'dkcenter');
  foreach ( $vars['css']['all']['module'] as $css =>$val ){
	$theme_css=$path_to_theme . '/css/' . basename($css);
	if (file_exists($theme_css)) {
		$vars['css']['all']['module'][$theme_css] = $val;
		unset($vars['css']['all']['module'][$css]);
	}
  }

  $vars['styles'] = drupal_get_css($vars['css']);
  unset($path_to_theme);
}
//

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function dkcenter_preprocess_node(&$variables) {
	$node = $variables['node']; // Declaring array of variables

	// Creating projects variables
	$variables['projectTitle'] = $node->title; // Title of the Project
	$variables['projectBody'] = $node->content['body']['#value']; // Main project text, HTML possible
	$variables['projectHeader'] = $node->field_project_header[0]['safe']; // Project header (h2 header)
	$variables['projectID'] = $node->field_project_number[0]['value']; // Project identificator, using in id= tag
	$variables['projectSummary'] = $node->teaser; // Teaser for the frontpage

	// Variables of Image
	$variables['projectImage_filename'] = $node->field_project_image[0]['filename'];
	$variables['projectImage_filepath'] = $node->field_project_image[0]['filepath'];
	$variables['projectImage_alt'] = $node->field_project_image[0]['data']['alt'];
	$variables['projectImage_title'] = $node->field_project_image[0]['data']['title'];

	$variables['projectCaption'] = $node->field_project_caption[0]['safe'];
	$variables['projectCitation'] = $node->field_project_citation[0]['safe'];

	// Variables of citationImage
	$variables['projectCitationImage_filename'] = $node->field_project_citation_image[0]['filename'];
	$variables['projectCitationImage_filepath'] = $node->field_project_citation_image[0]['filepath'];
	$variables['projectCitationImage_alt'] = $node->field_project_citation_image[0]['data']['alt'];
	$variables['projectCitationImage_title'] = $node->field_project_citation_image[0]['data']['title'];


	// Variables of s3Slideshow SLIDESHOW for FRONT PAGE
	$variables['s3slideshow_filename'] = $node->field_s3slideshow_image[0]['filename'];
	$variables['s3slideshow_filepath'] = $node->field_s3slideshow_image[0]['filepath'];
	$variables['s3slideshow_alt'] = $node->field_s3slideshow_image[0]['data']['alt'];
	$variables['s3slideshow_title'] = $node->field_s3slideshow_image[0]['data']['title'];

	$variables['s3slideshow_header'] = $node->field_s3slideshow_header[0]['safe'];
	$variables['s3slideshow_caption'] = $node->field_s3slideshow_caption[0]['safe'];
	$variables['s3slideshow_link'] = $node->field_s3slideshow_link[0]['safe'];


	// Variables for NEWS
	$variables['newsTitle'] = $node->field_news_header[0]['safe']; //News Header Title
	$variables['newsBody'] = $node->content['body']['#value'];
	$variables['newsSummary'] = $node->teaser;
	$variables['newsID'] = $node->nid;
	// News IMAGES
	$variables['newsImage_filename'] = $node->field_news_image[0]['filename'];
	$variables['newsImage_filepath'] = $node->field_news_image[0]['filepath'];
	$variables['newsImage_alt'] = $node->field_news_image[0]['data']['alt'];
	$variables['newsImage_title'] = $node->field_news_image[0]['data']['title'];
	// News CAPTION
	$variables['newsCaption'] = $node->field_news_image[0]['data']['title'];
	// Extra image
	$variables['newsImage_filename2'] = $node->field_news_image[1]['filename'];
	$variables['newsImage_filepath2'] = $node->field_news_image[1]['filepath'];
	$variables['newsImage_alt2'] = $node->field_news_image[1]['data']['alt'];
	$variables['newsImage_title2'] = $node->field_news_image[1]['data']['title'];
	$variables['newsCaption2'] = $node->field_news_image[1]['data']['title'];

	// Variables for WEBFORMS
	$variables['formTitle'] = $node->title;
	$variables['formHeader'] = $node->field_webform_header[0]['safe'];
	$variables['formBody'] = $node->content['body']['#value'];
	$variables['formImage_filename'] = $node->field_webform_image[0]['filename'];
	$variables['formImage_filepath'] = $node->field_webform_image[0]['filepath'];
	$variables['formImage_alt'] = $node->field_webform_image[0]['data']['alt'];
	$variables['formImage_title'] = $node->field_webform_image[0]['data']['title'];
	$variables['formCaption'] = $node->field_webform_caption[0]['safe'];

	// And THE LAST - variables for COMMON CONTENT
	$variables['commonTitle'] = $node->title;
	$variables['commonHeader'] = $node->field_common_header[0]['safe'];
	$variables['commonBody'] = $node->content['body']['#value'];
	$variables['commonImage_filename'] = $node->field_common_image[0]['filename'];
	$variables['commonImage_filepath'] = $node->field_common_image[0]['filepath'];
	$variables['commonImage_alt'] = $node->field_common_image[0]['data']['alt'];
	$variables['commonImage_title'] = $node->field_common_image[0]['data']['title'];
	$variables['commonCaption'] = $node->field_common_caption[0]['safe'];

	// Variables for TextArea at the right
	$variables['commonTextArea'] = $node->field_textarea_right[0]['safe'];

	// Variables for INLINE IMAGES
	$variables['commonInlineImage_filename'] = $node->field_common_inline_image[0]['filename'];
	$variables['commonInlineImage_filepath'] = $node->field_common_inline_image[0]['filepath'];
	$variables['commonInlineImage_alt'] = $node->field_common_inline_image[0]['data']['alt'];
	$variables['commonInlineImage_title'] = $node->field_common_inline_image[0]['data']['title'];
	$variables['commonInlineImage_caption'] = $node->field_common_inline_image[0]['data']['title'];

	// Variables for TABLES will going further
	$variables['commonTable'] = $node->field_common_table[0]['value'];
	
	// Variables for PARTNERS
	$variables['partners_filename'] = $node->field_partners_partner[0]['filename'];
	$variables['partners_filepath'] = $node->field_partners_partner[0]['filepath'];
	$variables['partners_alt'] = $node->field_partners_partner[0]['data']['alt'];
	$variables['partners_url'] = $node->field_partners_partner[0]['data']['title'];
	$variables['partners_title'] = $node->field_partners_partner[0]['data']['description'];

}


  // Optionally, run node-type-specific preprocess functions, like
 /* // STARTERKIT_preprocess_node_page() or STARTERKIT_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $vars['node']->type;
  if (function_exists($function)) {
    $function($vars, $hook);
  } */


/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_comment(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_block(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */
