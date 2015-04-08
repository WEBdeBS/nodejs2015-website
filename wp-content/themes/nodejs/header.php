<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php wp_title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>">
		<?php wp_head(); ?>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-46921107-1']);
			_gaq.push(['_setDomainName', 'nodejsconf.it']);
			_gaq.push(['_setAllowLinker', true]);
			_gaq.push(['_trackPageview']);
			_gaq.push(function() {
				var pageTracker = _gat._getTrackerByName();
				var iframe = document.getElementById('myIFrame');
				iframe.src = pageTracker._getLinkerUrl('http://www.eventbrite.it/tickets-external?eid=9509179211&ref=etckt&v=2');
			});
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</head>
	<body>
		<div class="topbar">
		<?php 
			$options = get_option('nodejs_theme_options'); 
			$social_array = array('facebook', 'twitter', 'vimeo');
			foreach($social_array as $social){
				$key = 'nodejs_' . $social;
				if(isset($options[$key]) && !(empty($options[$key]))){
					echo '<a target="_blank" href="' . $options[$key] . '">';
					echo '<img src="' .  get_template_directory_uri() . '/images/' . $social . '.png" alt="">';
					echo '</a>';
				}
			}
		?>
		</div>
		<div class="header">
			<img class="header__knot" src="<?php echo get_template_directory_uri(); ?>/images/header-node-corner.png" alt="">
			<header class="header__title">
				<h1>- <a href="<?php echo get_bloginfo('url'); ?>"><?php echo get_bloginfo('name'); ?></a> -</h1>
				<h2 class="desktop-header"><?php echo get_bloginfo('description'); ?></h2>
				<h3><?php echo $options['nodejs_data']; ?> - <?php echo $options['nodejs_luogo']; ?></h3>
			</header>
		</div>
		<nav class="nav">
		<div class="mobile-menu__container"><a href="#" class="mobile-menu"></a></div>	
		<?php
			$args = array(
				'theme_location' => 'main-menu',
				'container' => 'div',
				'container_class' => 'main-menu'
			);
			wp_nav_menu($args); 
		?>
		</nav>
		<div class="hr"></div>