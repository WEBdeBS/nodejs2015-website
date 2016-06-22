<?php get_header(); ?>
	<div class="content">
		<article class="main-page">
			<div class="news-container col-sm-9">
	<?php 
		if (have_posts()) {
			while(have_posts()){
				the_post(); 
	?>
			<div class="main-page__content news-content">
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
			<?php  get_template_part('shared', 'latest-interviews'); ?>
	</div>
<?php get_footer(); ?>