<?php

/**
 * 	Template Name: Homepage template
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
		<div class="main-page__content">
			<?php the_content(); ?>
		</div>
		<?php
			$icon = types_render_field('homepage-icona-box', array('post_id' => $post->ID, 'output' => 'raw'));
			$background = '';
			if($icon){
				$background = 'style="background-image: url(\'' . $icon .'\')"';	
			}
			echo '<div class="side-page__content"' . $background . '>';
			$title = types_render_field('homepage-titolo-box', array('post_id' => $post->ID));
			echo '<h1>' . $title . '</h1>';
			echo types_render_field('homepage-immagine-box', array('post_id' => $post->ID));
			echo '<p>' . types_render_field('homepage-testo-box', array('post_id' => $post->ID)) . '</p>';
			$link = types_render_field('homepage-link-venue', array('post_id' => $post->ID, 'output' => 'raw'));
			if($link){
				echo '<a href="' . $link . '">INFO</a>';
			}
		?>
		</div>
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
				height="300" 
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
<div class="content">
	<div class="pages">
		<article class="page">
			<?php 
				$left_icon = types_render_field('homepage-left-icon', array('post_id' => $post->ID));
				$left_title = types_render_field('homepage-left-title', array('post_id' => $post->ID));
				$left_content = types_render_field('homepage-left-content', array('post_id' => $post->ID));
				$right_icon = types_render_field('homepage-right-icon', array('post_id' => $post->ID));
				$right_title = types_render_field('homepage-right-title', array('post_id' => $post->ID));
				$right_content = types_render_field('homepage-right-content', array('post_id' => $post->ID));
			?>
			<div class="title">
				<?php echo $left_icon . $left_title; ?>
			</div>
			<div class="page__separator">˜</div>
				<?php echo $left_content; ?>
		</article>
		<article class="page">
			<div class="title">
				<?php echo $right_icon . $right_title; ?>         
			</div>
			<div class="page__separator">˜</div>
			<?php echo $right_content; ?>
		</article>
	</div>
</div>	
<?php get_footer(); ?>