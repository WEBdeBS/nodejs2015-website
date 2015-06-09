<?php

/**
 * 	Template Name: Homepage new template
 */

?>

<?php 
	get_header();
	$options = get_option('nodejs_theme_options'); 
	if (have_posts()) {
		while(have_posts()){
			the_post(); 
?>
<div class="content">
	<article class="main-page">
		<div class="new-home__page-content">
			<?php the_content(); ?>
		</div>
		<?php
			$icon = types_render_field('homepage-icona-box', array('post_id' => $post->ID, 'output' => 'raw'));
			$background = '';
			if($icon){
				$background = 'style="background-image: url(\'' . $icon .'\')"';	
			}
			echo '<div class="new-home__side-page-content"' . $background . '>';
			$title = types_render_field('homepage-titolo-box', array('post_id' => $post->ID));
			echo '<h1>' . $title . '</h1>';
			echo types_render_field('homepage-immagine-box', array('post_id' => $post->ID));
			echo '<p>' . types_render_field('homepage-testo-box', array('post_id' => $post->ID)) . '</p>';
			$link = types_render_field('homepage-link-venue', array('post_id' => $post->ID, 'output' => 'raw'));
			if($link){
				echo '<a href="' . $link . '#venue-accomodation">ACCOMODATION</a> - ';
				echo '<a href="' . $link . '#venue-direction">DIRECTION</a>';
			}
			$gallery = types_render_field('homepage-gallery-box', array('post_id' => $post->ID, 'output' => 'raw', 'separator' => ','));
			$gallery_array = explode(',', $gallery);
			echo '<div class="venue-gallery">';
			foreach($gallery_array as $g_img){
				$img_id = url_to_postid($g_img); 
				echo '<a class="venue-gallery__item" href="' . $g_img . '"><span style="background-image: url(\'' . $g_img . '\')"></span></a>';
			}
			echo '</div>';
		?>
		</div>
		<?php  get_template_part('shared', 'latest-news'); ?>
	</article>
</div>
<?php 
		if(isset($options['nodejs_eventbrite_code']) && !empty($options['nodejs_eventbrite_code'])){
?>
<div class="content">
	<div class="tickets_container" id="homepage-ticket">
		<div class="page title tickets__title">
			<img src="<?php echo get_template_directory_uri(); ?>/images/title-tickets.png" alt="">
			Tickets
		</div>	
		<div class="page tickets__eventbrite-container">
			<iframe 
				src="http://www.eventbrite.com/tickets-external?eid=<?php echo $options['nodejs_eventbrite_code']; ?>&amp;ref=etckt&amp;v=2" 					frameborder="0" 
				height="350" 
				width="100%" 
				vspace="0" hspace="0" 
				marginheight="5" marginwidth="5" 
				scrolling="auto" 
				allowtransparency="true">
			</iframe>
		</div>
	</div>
</div>	
<?php 
		}
	}
}
?>
<div class="hr"></div>
<?php 
	get_template_part('speaker', 'carousel');
?>	
<?php get_footer(); ?>