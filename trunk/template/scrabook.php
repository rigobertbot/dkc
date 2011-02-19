<meta http-equiv="content-type" content="text/html;charset=utf-8">
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
			
			
			
			
			<div id="main-wrapper"><div id="main" class="clearfix<?php if ($primary_links || $navigation) { print ' with-navigation'; } ?>">

      <div id="content" class="column"><div class="section">
        <?php print $messages; ?>
        <?php if ($tabs): ?>
          <div class="tabs"><?php print $tabs; ?></div>
        <?php endif; ?>
        <?php print $help; ?>
        <?php print $content_bottom; ?>

      </div></div> <!-- /.section, /#content -->

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
	
	

<div class="meltedContentsContainer">
<div class="mainImage" id="slideshowIndex">
	<div id="slider">
		<ul id="sliderContent">
			<li class="sliderImage">
			 <img src="http://dkz.neezyl.com/sites/default/files/slider/1.jpg" alt="Мобильная школа" title="Мобильная школа" />
			<div class="bottom">
			 <h3><a href="projects/mobile-school.html"></a></h3>
			 <a href="projects/mobile-school.html"></a>
			</div>
		 </li>
    

<li class="sliderImage">
	<img src="http://dkz.neezyl.com/sites/default/files/slider/2.jpg" alt="Телефон доверия" title="Телефон доверия" />
		<div class="bottom">
			<h3><a href="projects/telephone-doveria.html"></a></h3>
			<a href="projects/telephone-doveria.html"></a>
		</div>
</li>
    

<li class="sliderImage">
	<img src="http://dkz.neezyl.com/sites/default/files/slider/3.jpg" alt="Проект «Пространство радости»" title="Проект «Пространство радости»" />
		<div class="bottom">
			<h3><a href="projects/prostranstvo-radosti.html"></a></h3>
			<a href="projects/prostranstvo-radosti.html"></a>
		</div>
</li>
  	  	<li>
			<div class="clear sliderImage"></div>
		</li>
  	</ul>
	</div>
</div>

<!-- /.region -->
		</div>



