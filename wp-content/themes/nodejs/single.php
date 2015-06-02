<?php get_header(); ?>
	<div class="content">
		<article class="main-page">
			<div class="title title--main-page col-sm-3">
				<img src="<?php echo get_template_directory_uri(); ?>/images/title-tickets.png" alt="">
				Nautical Bullettin
			</div>
			<div class="news-container col-sm-6">
	<?php 
		if (have_posts()) {
			while(have_posts()){
				the_post(); 
	?>
			<div class="main-page__content news-content">
				<p class="news-date"><?php echo get_the_date('F, jS Y');  ?></p>
				<?php 
					the_title('<h1>', '</h1>');
					the_content();
				?>	
			</div>	
	<?php 
			}
		}
	?>	
			</div>
			<?php  get_template_part('shared', 'latest-news'); ?>
	</div>
<?php get_footer(); ?>