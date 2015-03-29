		<?php 
			$options = get_option('nodejs_theme_options');
		?>
		<div class="footer-block">
			<div class="content">
				<footer class="footer">
					<div class="footer__box footer__box--main">
						<div class="footer__title">- <?php echo get_bloginfo('name'); ?> -</div>
						<div class="footer__subtitle"><?php echo get_bloginfo('description'); ?></div>
						<img src="<?php echo get_template_directory_uri(); ?>/images/bg-node.png" alt="">
					</div>
					<div class="footer__box">
						<p>
							<strong>NodejsConfIT</strong> is proudly organized by 
							<img src="<?php echo get_template_directory_uri(); ?>/images/webdebs.png" alt="WEBdeBS">
							<a target="_blank" href="http://webdebs.org/">www.webdebs.org</a>
							<a href="mailto:info@webdebs.org">info@webdebs.org</a>
						</p>
					</div>
					<div class="footer__box footer__box--sponsors">
						<div class="footer__main-sponsor">
							<div class="footer__main-sponsor-text">Main Conf<br/>Spinsor</div>
							<img src="<?php echo get_template_directory_uri(); ?>/images/yourlogohere.png" alt="Your logo here">
						</div>
						<?php 
							$args = array(
								'theme_location' => 'footer-menu',
								'container' => 'nav',
								'container_class' => 'footer__nav-menu'
							);
							wp_nav_menu($args);
						?>
						<div class="footer__social">Follow us on
						<?php 
							$social_array = array('facebook', 'twitter', 'vimeo');
							foreach($social_array as $index => $social){
								$separator = ', ';
								if(($index + 1) == count($social_array)){
									$separator = '';
								} else if(($index + 2) == count($social_array)){
									$separator = ' and ';
								}
								$key = 'nodejs_' . $social;
								if(isset($options[$key]) && !(empty($options[$key]))){
									$label = ucwords($social);
									echo '<a target="_blank" href="' . $options[$key] . '">' . $label . '</a>' . $separator ;
								}
							}
						?>
						</p>
					</div>
				</footer>
			</div>
		</div>
		<div class="strips"></div>
		<script src="<?php echo get_template_directory_uri(); ?>/app.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>