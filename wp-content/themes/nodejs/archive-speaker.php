<?php get_header(); ?>
	<div class="content">
		<article class="main-page">
			<div class="talks__title-column">
				<div class="title title--main-page">
					<img src="<?php echo get_template_directory_uri(); ?>/images/title-tickets.png" alt="">
					Speakers
				</div>
			</div>
			<div class="talks__talk-list">
			<?php 
				if (have_posts()) {
					while(have_posts()){
					the_post(); 
			?>
				<div class=""><?php the_title();?></div>
			<?php 
					}
				}
			?>
			</div>
		</article>		
	</div>
<?php get_footer(); ?>