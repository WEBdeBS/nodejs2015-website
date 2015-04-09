<?php

/**
 * 	Template Name: Venue template
 */

?>

<?php get_header(); ?>
	<div class="content">
	<?php 
		if (have_posts()) {
			while(have_posts()){
				the_post(); 
	?>
		<article class="main-page">
			<div class="title title--main-page col-sm-3">
				<?php 
					$img = types_render_field('page-icon', array('post_id' => $post->ID, 'output' => 'raw'));
					if($img){
						echo '<img src="' . $img . '" alt="' . get_the_title($id) . '">';
					}
					the_title();
				?>
			</div>
			<div class="main-page__content col-sm-6">
				<?php the_content(); ?>
			</div>
			<div class="venue-website col-sm-3">
				<?php 
					$img = types_render_field('venue-immagine', array('post_id' => $post->ID, 'output' => 'raw'));
					$link = types_render_field('venue-website', array('post_id' => $post->ID, 'output' => 'raw'));
					echo '<a href="' . $link . '" target="_blank"><img src="' . $img . '" alt="' . get_the_title($id) . '">';
					echo '<span>venue website</span></a>';
				?>
			</div>
		</article>
		<div class="venue-gallery">
			<?php 
				$gallery = types_render_field('venue-gallery', array('post_id' => $post->ID, 'output' => 'raw', 'separator' => ','));
				$gallery_array = explode(',', $gallery);
				foreach($gallery_array as $g_img){
					$img_id = url_to_postid($g_img); 
					echo '<a class="venue-gallery__item" href="' . $g_img . '"><span style="background-image: url(\'' . $g_img . '\')"></span></a>';
				}
			?>
		</div>
	</div>
	<div class="hr"></div>
	<div class="content">
		<article class="main-page">
			<div class="col-sm-4 venue__direction">
				<div class="title">
					<img src="<?php echo get_template_directory_uri(); ?>/images/title-direction.png" alt="">
					Direction
				</div>	
				<?php 
					$direction_content = types_render_field('venue-direction', array('post_id' => $post->ID, 'output' => 'raw'));
					echo '<div class="venue__direction-content">' . $direction_content . '</div>';
				?>			
			</div>
			<div class="col-sm-4 venue__center-content">
				<?php $map = types_render_field('venue-map', array('post_id' => $post->ID, 'output' => 'raw'));?>
				<iframe frameborder="0" style="border:0" src="<?php echo $map; ?>"></iframe>
				<?php 
					$link_content = types_render_field('venue-links-info', array('post_id' => $post->ID, 'output' => 'raw'));
					echo '<div class="venue__links-content">';
					echo '<h3>Links&Info</h3>';
					echo $link_content . '</div>';
				?>
			</div>
			<div class="col-sm-4 venue__accomodation">
				<div class="title">
					<img src="<?php echo get_template_directory_uri(); ?>/images/title-accomodation.png" alt="">
					Accomodation
				</div>
				<?php 
					$accomodation_content = types_render_field('venue-accomodation', array('post_id' => $post->ID, 'output' => 'raw'));
					echo '<div class="venue__accomodation-content">' . $accomodation_content . '</div>';
				?>
			</div>
		</article>	
	<?php 
			}
		}
	?>	
	</div>
<?php get_footer(); ?>