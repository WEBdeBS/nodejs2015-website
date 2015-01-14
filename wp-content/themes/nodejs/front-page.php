<?php get_header(); ?>
  <div class="content">
    <?php $page = get_page(4); ?>
    <article id="<?php echo get_post_field("post_name", $page->ID); ?>" class="main-page">
      <div class="main-page__title">
        <img src="<?php echo get_field("icon", $page->ID); ?>" alt="<?php echo get_the_title($page->ID); ?>">
        <?php echo get_the_title($page->ID); ?>
      </div>
      <div class="main-page__content">
        <header>
          <h1>
            <?php echo get_field("title", $page->ID); ?>
          </h1>
          <h2>
            <?php echo get_field("subtitle", $page->ID); ?>
          </h2>
        </header>
        <p>
          <?php echo get_post_field("post_content", $page->ID); ?>
        </p>
        <a class="main-page__button" href="#">
          Send now!
        </a>
      </div>
    </article>
  </div>
  <div class="hr"></div>
<?php get_footer(); ?>