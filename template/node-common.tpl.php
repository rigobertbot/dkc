<?php
// $Id: node-common.tpl.php,v 0.3.3 2010/12/23 23:48:33 talbot Exp $

/**
 * @file node.tpl.php
 *
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $picture: The authors picture of the node output from
 *   theme_user_picture().
 * - $date: Formatted creation date (use $created to reformat with
 *   format_date()).
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $submitted: themed submission information output from
 *   theme_node_submitted().
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $teaser: Flag for the teaser state.
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 */
?>
<?php
/*
 * Здесь описывается оформление ноды общих страниц
 */
?>
<?php if ($page): ?>
 <h2><?php print $title; ?></h2>
 <?php if (!$commonImage_filename && !$commonTextArea && !$commonTable): ?>
 <div class="content"><?php print $commonBody; ?>
	<?php if ($commonInlineImage_filename): ?>
	 <div class="inlineImage">
		 <img src="http://deticenter.org/<?php print $commonInlineImage_filepath; ?>" alt="<?php print $commonInlineImage_alt; ?>" title="<?php print $commonInlineImage_title; ?>" /><div class="inlineCaption"><?php print $commonInlineImage_caption; ?></div>
	 </div>
	<?php endif; ?>
 </div>
 <?php else: ?>
 <div class="aboutProject"><?php print $commonBody; ?>
	<?php if ($commonInlineImage_filename): ?>
	 <div class="inlineImage">
		 <img src="http://deticenter.org/<?php print $commonInlineImage_filepath; ?>" alt="<?php print $commonInlineImage_alt; ?>" title="<?php print $commonInlineImage_title; ?>" /><div class="inlineCaption"><?php print $commonInlineImage_caption; ?></div>
	 </div>
	<?php endif; ?>
 </div>
 <div class="rightImage">
  <img src="http://deticenter.org/<?php print $commonImage_filepath; ?>" alt="<?php print $commonImage_alt; ?>" title="<?php print $commonImage_title; ?>" /></div>

 <?php if ($commonCaption): ?>
 <div class="caption"><?php print $commonCaption; ?></div>
 <?php endif; ?>
 <?php if ($commonTextArea): ?>
 	<div class="textArea"><?php print $commonTextArea; ?></div>
 <?php endif; ?>
 <?php if ($commonTable): ?>
	<?php print $commonTable; ?>
 <?php endif; ?>
 <?php endif; ?>
<?php endif; ?>
