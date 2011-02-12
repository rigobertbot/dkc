<?php
// $Id: front-page.tpl.php,v 0.01 2010/11/27 03:36:04 Dmitry Tretyakov Exp $

/**
 * This is front page template
 *
 *
 *
 */
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
<base href="http://talbothouse.local<?php print $base_path.$directory; ?>" />
</head>
<body>
	<!-- Тут располагается картинка из заголовка с дитем -->
	<?php if ($header_image): ?>
		<div class="logo" >
			<a href="<?php print $base_path; ?>" >
			<img src="/images/header.jpg" title="DKZ" alt="Санкт-Петербургская благотворительная общественная организация Детский кризисный центр" /></a>
		</div>  
	<?php endif; ?>
	
	<!-- Горизонтальное меню, одинаково для всех должно быть -->
	<?php if ($menu): ?>
		<div class="menu">
		
		</div>
	<?php endif; ?>
<?php if ($is_front): ?>	
	<!-- Logotype and main site header -->
	<?php if ($site_header): ?>
		<div class="header">
			<div id="mainHeaderContainer">
					<a href="<?php print $front_page; ?>" 
					title="<?php print t('Home'); ?>" rel="home" id="logo">
					<img class="logotype" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>     			 
				<?php if ($site_slogan): ?>
					<p id="upheader"><?php print $site_slogan; ?></p>
				<?php endif; ?>

				<?php if ($site_name): ?>
					<?php if ($title): ?>
						<h1>
						<a href="<?php print $front_page; ?>" 
						title="<?php print t('Home'); ?>" rel="home">
						<?php print $site_name; ?></a>
						</h1>
					<?php else: /* Use h1 when the content title is empty */ ?>
					  <h1>
						<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
					  </h1>
					<?php endif; ?>
				<?php endif; ?>          
			</div>
    	</div>
	<?php endif; ?>
	
	<!-- Left column container -->
	<?php if ($content_left): ?>
		<div class="subNav">
							
				<a href="http://it.besprizornik.spb.ru">
				<img src="./images/italiano.gif" title="Italian version" alt="Italiano" class="subNavImage"/></a>
				
				<a href="http://en.besprizornik.spb.ru">
				<img src="./images/english.gif" title="English version" alt="English" class="subNavImage"/></a>
							
				<a href="http://besprizornik.spb.ru">
				<img src="./images/russian.gif" title="Русская версия сайта" alt="На русском" class="subNavImage"/></a>
				
				<a href="http://dkz.neezyl.com">
				<img src="./images/home.gif" title="Вернуться на главную страницу" alt="Домой" /></a>
			</div>
	<?php endif; ?>
	
	<!-- Right column container -->
	<?php if ($content_right): ?>
	
	<?php endif; ?>
	
	<!-- News container -->
	<?php if ($content_news): ?>
	
	<?php endif; ?>
	
	<!-- End of front page -->
<? endif; ?>
	
	
	
	<!-- Footer -->
	<?php if ($site_footer): ?>
		<ul>
		<li>Переменная <code>$directory</code>:&nbsp;<?php print $directory; ?></li>
		<li>Переменная <code>$base</code>:&nbsp;<?php print $base; ?></li>
		<li>Переменная <code>$id</code>:&nbsp;<?php print $id; ?></li>
		<li>Переменная <code>$base_path</code>:&nbsp;<?php print $base_path; ?></li>
		</ul>
	<?php endif; ?>
	
	
	<!-- Blocks adding and other things -->
	
	 <div id="main-wrapper"><div id="main" class="clearfix<?php if ($primary_links || $navigation) { print ' with-navigation'; } ?>">

      <div id="content" class="column"><div class="section">

        <?php if ($mission): ?>
          <div id="mission"><?php print $mission; ?></div>
        <?php endif; ?>

        <?php print $highlight; ?>

        <?php print $breadcrumb; ?>
        <?php if ($title): ?>
          <h1 class="title"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print $messages; ?>
        <?php if ($tabs): ?>
          <div class="tabs"><?php print $tabs; ?></div>
        <?php endif; ?>
        <?php print $help; ?>

        <?php print $content_top; ?>

        <div id="content-area">
          <?php print $content; ?>
        </div>

        <?php print $content_bottom; ?>

        <?php if ($feed_icons): ?>
          <div class="feed-icons"><?php print $feed_icons; ?></div>
        <?php endif; ?>

      </div></div> <!-- /.section, /#content -->

      <?php if ($primary_links || $navigation): ?>
        <div id="navigation"><div class="section clearfix">

          <?php print theme(array('links__system_main_menu', 'links'), $primary_links,
            array(
              'id' => 'main-menu',
              'class' => 'links clearfix',
            ),
            array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => 'element-invisible',
            ));
          ?>

          <?php print $navigation; ?>

        </div></div> <!-- /.section, /#navigation -->
      <?php endif; ?>

      <?php print $sidebar_first; ?>

      <?php print $sidebar_second; ?>

    </div></div> <!-- /#main, /#main-wrapper -->

    <?php if ($footer || $footer_message || $secondary_links): ?>
      <div id="footer"><div class="section">

        <?php print theme(array('links__system_secondary_menu', 'links'), $secondary_links,
          array(
            'id' => 'secondary-menu',
            'class' => 'links clearfix',
          ),
          array(
            'text' => t('Secondary menu'),
            'level' => 'h2',
            'class' => 'element-invisible',
          ));
        ?>

        <?php if ($footer_message): ?>
          <div id="footer-message"><?php print $footer_message; ?></div>
        <?php endif; ?>

        <?php print $footer; ?>

      </div></div> <!-- /.section, /#footer -->
    <?php endif; ?>

<!-- /#page, /#page-wrapper -->
	
	
  
  <?php print $page_closure; ?>

  <?php print $closure; ?>

</body>
</html>

