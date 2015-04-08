<?php get_header(); ?>
	<div class="content">
	<?php 
		if (have_posts()) {
			while(have_posts()){
				the_post(); 
	?>
		<div class="pages">
			<article class="page speaker-box">
				<?php 
					$speakers = types_child_posts('speaker'); 
					foreach($speakers as $speaker){
						$twitter = types_render_field('speaker-twitter', array('post_id' => $speaker->ID, 'output' => 'raw'));
						$links = types_render_field('speaker-links', array('post_id' => $speaker->ID, 'target' => '_blank'));
						$img = types_render_field('speaker-photo', array('post_id' => $speaker->ID));
						echo '<div class="col-lg-5">';
						echo '<div class="title speaker__name">';
						echo '<img src="' . get_template_directory_uri() . '/images/title-speakers.png" alt="">';
						echo $speaker->post_title . '</div>';
						echo '<div class="speaker__image">' . $img . '</div>';
						echo '</div>';
						echo '<div class="col-lg-7">';
						echo '<h4>Bio</h4>';
						echo '<div class="speaker__bio">' . apply_filters('the_content',$speaker->post_content) . '</div>';
						echo '<h4>Twitter&Link</h4>';
						if($twitter){
							echo '<a href="https://twitter.com/' . $twitter . '" target="_blank">@' . $twitter .'</a>';
						}
						echo $links;
						echo '</div>';
					}
				?>
			</article>
			<article class="page talk-box">
				<?php 
					$levels = wp_get_post_terms($post->ID, 'talk-level');
					$schedule = types_render_field('talk-schedule', array());
					echo '<p class="talk__level-schedule">';
					if(isset($levels[0])){
						echo '<strong>Level</strong>: ' . $levels[0]->description . ' - '; 
					}
					echo '<span class="talk__schedule"> <strong>Schedule</strong>: ';
					if($schedule){
						echo $schedule;
					} else {
						echo 'Coming soon';
					}
					echo '</span></p>';
					the_title('<h1>', '</h1>');
					echo '<h2>Abstract</h2>';
					the_content();
				?>
			</article>
		</div>	
	<?php 
			}
		}
	?>	
	</div>
<?php get_footer(); ?>