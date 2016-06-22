<div class="latest-news col-sm-3">
	<h4><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">ALl Interviews</a></h4>
	<ul class="latest-news__list">
	<?php 
		$args = array(
			'posts_per_page'   => 3,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'post_type'        => 'interview',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
		$posts_array = get_posts($args);
		foreach($posts_array as $p){
			echo '<li><a href="' . get_permalink($p->ID) . '">' . get_the_title($p->ID) . '</a></li>';
		}
	?>
	</ul>
</div>	