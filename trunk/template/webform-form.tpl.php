<?php
// $Id: webform-form.tpl.php,v 1.1 2009/05/22 03:11:18 quicksketch Exp $

/**
 * @file
 * Customize the display of a complete webform.
 *
 * This file may be renamed "webform-form-[nid].tpl.php" to target a specific
 * webform on your site. Or you can leave it "webform-form.tpl.php" to affect
 * all webforms on your site.
 *
 * Available variables:
 * - $form: The complete form array.
 * - $nid: The node ID of the Webform.
 *
 * The $form array contains two main pieces:
 * - $form['submitted']: The main content of the user-created form.
 * - $form['details']: Internal information stored by Webform.
 */
?>
<?php
  /** If editing or viewing submissions, display the navigation at the top.
  	* if (isset($form['submission_info']) || isset($form['navigation'])) {
  	*  print drupal_render($form['navigation']);
  	*  print drupal_render($form['submission_info']);
  	* }
   **/

  // Print out the main part of the form.
  // Feel free to break this up and move the pieces within the array.
 print drupal_render($form['submitted']['_name']);
 print drupal_render($form['submitted']['_contacts']);
 print drupal_render($form['submitted']['__email']);
 print drupal_render($form['submitted']['__application']);
 print drupal_render($form['details']);
 print drupal_render($form['form_build_id']);
 print drupal_render($form['form_token']);
 print drupal_render($form['form_id']);
 print drupal_render($form);
 
  // Always print out the entire $form. This renders the remaining pieces of the
  // form that haven't yet been rendered above.
 // print drupal_render($form);

  /** Print out the navigation again at the bottom.
   * if (isset($form['submission_info']) || isset($form['navigation'])) {
   * unset($form['navigation']['#printed']);
   * print drupal_render($form['navigation']);
   * }
   */
?>
