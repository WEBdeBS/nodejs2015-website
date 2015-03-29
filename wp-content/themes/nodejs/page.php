<?php get_header(); ?>
	<div class="content">
	<?php 
		if (have_posts()) {
			while(have_posts()){
				the_post(); 
	?>
		<article class="main-page">
			<div class="title title--main-page col-sm-6">
				<?php 
					$img = types_render_field('page-icon', array('post_id' => $post->ID, 'output' => 'raw'));
					if($img){
						echo '<img src="' . $img . '" alt="' . get_the_title($id) . '">';
					}
					the_title();
				?>
			</div>
			<div class="main-page__content">
				<?php the_content(); ?>
			</div>
		</article>
	<?php 
			}
		}
	?>	
	</div>
<?php get_footer(); ?>