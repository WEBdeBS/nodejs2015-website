<?php get_header(); ?>
  <div class="content">
    <?php $id = 4; ?>
    <article id="<?php echo get_post_field("post_name", $id); ?>" class="main-page">
      <div class="title title--main-page">
        <img src="<?php echo get_field("icon", $id); ?>" alt="<?php echo get_the_title($id); ?>">
        <?php echo get_the_title($id); ?>
      </div>
      <div class="main-page__content">
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
        <a class="main-page__button" href="#">
          Send now!
        </a>
      </div>
    </article>
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