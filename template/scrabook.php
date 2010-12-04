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
			
			
			
			
			