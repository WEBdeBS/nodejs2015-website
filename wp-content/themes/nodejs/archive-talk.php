<?php 
	get_header(); 
	$options = get_option('nodejs_theme_options'); 
?>
	<div class="content">
		<article class="main-page row">
			<div class="talks__title-column col-md-3 col-sm-4">
				<div class="title title--main-page">
					<img src="<?php echo get_template_directory_uri(); ?>/images/title-speakers.png" alt="">
					Speakers
				</div>
				<p class="speaker-order">Order by</p>
				<div class="speaker-order-links">
					<?php 
						if(isset($options['nodejs_schedule'])){
							echo '<a href="#" data-sort-by="date" class="active">Schedule</a>';
					?>
					<a href="#" data-sort-by="name" filter-talk="true">Speaker</a>
					<?php 
						} else {
					?>
					<a href="#" data-sort-by="name" filter-talk="true" >Speaker</a>
					<?php } ?>
					<a href="#" data-sort-by="level" filter-talk="true">Level</a>
				</div>	
			</div>
			<div class="talks__talk-list col-md-9 col-sm-8">
			<?php 
				if (have_posts()) {
					while(have_posts()){
					the_post(); 
					$workshop_class = '';
					$workshop = types_render_field('talk-workshop', array('post_id' => $post->ID));
					if ($workshop){
						$workshop_class = 'talk-item-content-workshop';
					}
			?>
				<div class="talk-item col-xs-12 col-md-6 col-lg-4 filter-talk">
					<div class="talk-item-content <?php echo $workshop_class; ?>">
				<?php
					if ($workshop){
						echo '<span class="workshop-ribbon"></span>';
					}
					$speaker = types_child_posts("speaker");
					foreach($speaker as $sp){
						$img = types_render_field('speaker-photo', array('post_id' => $sp->ID));
						$twitter = types_render_field('speaker-twitter', array('post_id' => $sp->ID, 'output' => 'raw'));
						echo '<div class="speaker-line">';
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
							if($workshop){
								$sorttime = intval($sorttime) - 1;
							}
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
			<?php 
				if(isset($options['nodejs_schedule'])){
					$args = array(
						'posts_per_page'   => -1,
						'post_type'        => 'interval',
						'post_status'      => 'publish'
					);
					$intervals = get_posts($args);
					foreach ($intervals as $interval){
						echo '<div class="talk-item talk-item-interval col-xs-12 col-md-6 col-lg-4">';
						echo '<div class="talk-item-content">';
						echo '<h2 class="sort-name">' . $interval->post_title . '</h2>';
						echo '<h3>' . $interval->post_content . '</h3>';
						$time = types_render_field('interval-start', array('post_id' => $interval->ID, 'format' => 'H:i'));
						$sorttime = types_render_field('interval-start', array('post_id' => $interval->ID, 'output' => 'raw'));
						echo '<div class="sort-date sort-hidden">'. $sorttime . '</div>';
						$time_end = types_render_field('interval-end', array('post_id' => $interval->ID, 'format' => 'H:i'));
						echo '<div class="schedule">' . $time;
						if($time_end){
							echo ' - ' . $time_end;
						}
						echo '</div>';		
						echo '</div>';
						echo '</div>';
					}
				}
			?>
			</div>
		</article>		
	</div>
<?php get_footer(); ?>