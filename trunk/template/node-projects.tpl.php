<?php
// $Id: node-projects.tpl.php,v 0.6.3 2010/12/10 14:48:33 talbot Exp $

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
 * Здесь описывается оформление ноды на самой странице проекта
 */
?>
<?php if ($page): ?>
 <h2><?php print $title; ?></h2>
 <div class="aboutProject"><?php print $projectBody; ?></div>
 <?php if ($projectImage_filename): ?>
 <div class="rightImage">
  <img src="http://deticenter.org/<?php print $projectImage_filepath; ?>" alt="<?php print $projectImage_alt; ?>" title="<?php print $projectImage_title; ?>" /></div>
 <?php endif; ?>
 <?php if ($projectCaption): ?>
 <div class="caption"><?php print $projectCaption; ?></div>
 <?php endif; ?>
 <?php if ($projectCitation): ?>
 <div class="citation">
 <?php if ($projectCitationImage_filename): ?>
  <img src="http://deticenter.org/<?php print $projectCitationImage_filepath; ?>" alt="<?php print $projectCitationImage_alt; ?>" title="<?php print $projectCitationImage_title; ?>" />
 <?php endif; ?>
 <?php print $projectCitation; ?></div>
 <?php endif; ?>
<?php endif; ?>

<?php
/*
 * Здесь описывается оформление тизера для главной страницы
 */
?>
<?php if ($teaser): ?>
<div class="project" id="project<?php print $projectID; ?>">
 <h3><a href="<?php print $node_url ?>" title="<?php print $node->field_section[0]['safe']; ?>"><?php print $node->field_section[0]['safe']; ?></a></h3>
<?php print $projectSummary; ?>
</div>
<?php endif; ?>