<?php get_header(); ?>
  <div class="content">
    <?php $id = 4; ?>
    <article class="main-page">
      <div id="<?php echo get_post_field("post_name", $id); ?>" class="main-page__content">
        <header>
          <h1>
            <?php echo get_field("title", $id); ?>
          </h1>
          <h2>
            <?php echo get_field("subtitle", $id); ?>
          </h2>
        </header>
        <p>
          <?php echo get_post_field("post_content", $id); ?>
        </p>
      </div>
      <?php $id = 39; ?>
      <div id="<?php echo get_post_field("post_name", $id); ?>" class="side-page__content">
        <header>
          <h1>
            <?php echo get_the_title($id); ?>
          </h1>
        </header>
        <p>
          <?php echo get_post_field("post_content", $id); ?>
        </p>
      </div>
      
    </article>
  </div>
	<div class="content">
    <?php $id = 40; ?>
		<div id="<?php echo get_post_field("post_name", $id); ?>" class="tickets_container">
				<div class="page title tickets__title">
            <img src="<?php echo get_field("icon", $id); ?>" alt="<?php echo get_the_title($id); ?>">
            <?php echo get_the_title($id); ?>
        </div>
				<div class="page tickets__eventbrite-container">
					<?php echo get_post_field("post_content", $id); ?>
				</div>
		</div>
	</div>	
  <div class="hr"></div>
  <div class="content">
    <div class="pages">
      <?php  
        $pageIds = array(6, 10);
        foreach ($pageIds as $id):
      ?>
        <article id="<?php echo get_post_field("post_name", $id); ?>" class="page">
          <div class="title">
            <img src="<?php echo get_field("icon", $id); ?>" alt="<?php echo get_the_title($id); ?>">
            <?php echo get_the_title($id); ?>
          </div>
          <div class="page__separator">
            &tilde;
          </div>
          <header>
            <h1>
              <?php echo get_field("title", $id); ?>
            </h1>
            <h2>
              <?php echo get_field("subtitle", $id); ?>
            </h2>
          </header>
          <p>
            <?php echo get_post_field("post_content", $id); ?>
          </p>
        </article>
      <?php  
        endforeach;
      ?>
    </div>
  </div>
<?php get_footer(); ?>
