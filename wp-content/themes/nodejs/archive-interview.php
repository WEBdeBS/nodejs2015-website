<?php get_header(); ?>
	<div class="content">
		<article class="main-page">
			<div class="title title--main-page col-sm-3">
				<img src="<?php echo get_template_directory_uri(); ?>/images/title-tickets.png" alt="">
				Interview
			</div>
			<div class="news-container col-sm-6">
	<?php 
		if (have_posts()) {
			while(have_posts()){
				the_post(); 
	?>
			<div class="main-page__content news-content">
				<?php 
					echo '<h1><a href="' . get_permalink($post->ID) . '" >';
					echo get_the_title();
					echo '</a></h1>';
					the_excerpt();
				?>
			</div>	
			
	<?php 
			}
			echo '<div class="nav-previous alignleft">' . get_next_posts_link( '<< Older posts' ) . '</div>';
			echo '<div class="nav-next alignright">' . get_previous_posts_link( 'Newer posts >>' ) . '</div>';
		}
	?>	
			</div>
			<?php  get_template_part('shared', 'latest-interviews'); ?>
	</div>
<?php get_footer(); ?>