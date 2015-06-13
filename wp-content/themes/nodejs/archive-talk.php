<?php 
	get_header(); 
	$options = get_option('nodejs_theme_options'); 
?>
	<div class="content">
		<article class="main-page row">
			<div class="talks__title-column col-sm-3">
				<div class="title title--main-page">
					<img src="<?php echo get_template_directory_uri(); ?>/images/title-speakers.png" alt="">
					Speakers
				</div>
				<p class="speaker-order">Order by</p>
				<div class="speaker-order-links">
					<a href="#" data-sort-by="name">Speaker</a>
					<a href="#" data-sort-by="level">Level</a>
					<?php 
						if(isset($options['nodejs_schedule'])){
							echo '<a href="#" data-sort-by="date">Schedule</a>';
						}
					?>
				</div>	
			</div>
			<div class="talks__talk-list col-sm-9">
			<?php 
				if (have_posts()) {
					while(have_posts()){
					the_post(); 
			?>
				<div class="talk-item col-sm-4">
					<div class="talk-item-content">
				<?php
					$speaker = types_child_posts("speaker");
					foreach($speaker as $sp){
						$img = types_render_field('speaker-photo', array('post_id' => $sp->ID));
						$twitter = types_render_field('speaker-twitter', array('post_id' => $sp->ID, 'output' => 'raw'));
						echo '<div class="spaeker-line">';
						echo '<div class="speaker-image">' . $img . '</div>';
						echo '<div class="speaker-info">';
						echo '<h2 class="sort-name">' . $sp->post_title . '</h2>';
						if($twitter){
							echo '<a class="twitter-link" href="https://twitter.com/' . $twitter . '" target="_blank">@' . $twitter .'</a>';
						}
						echo '</div>';
						echo '</div>';
					}
					echo '<h3><a href="' . get_permalink() .'">' . get_the_title() . '</a></h3>';
					if(isset($options['nodejs_schedule'])){
						$time = types_render_field('talk-schedule', array('post_id' => $post->ID, 'format' => 'H:i'));
						if($time){
							$sorttime = types_render_field('talk-schedule', array('post_id' => $post->ID, 'output' => 'raw'));
							echo '<div class="sort-date sort-hidden">'. $sorttime . '</div>';
							$time_end = types_render_field('talk-schedule-end', array('post_id' => $post->ID, 'format' => 'H:i'));
							echo '<div class="schedule">' . $time;
							if($time_end){
								echo ' - ' . $time_end;
							}
							echo '</div>';	
						}
					}
					$levels = wp_get_post_terms($post->ID, 'talk-level');
					if(isset($levels[0])){
						echo '<div class="sort-level sort-hidden">'. $levels[0]->term_order . '</div>';
						echo '<div class="level"><strong>Level</strong>: ' . $levels[0]->description . '</div>'; 
					}
					?>
				</div>
				</div>
			<?php 
					}
				}
			?>
			</div>
		</article>		
	</div>
<?php get_footer(); ?>