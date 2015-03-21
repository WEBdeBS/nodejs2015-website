<?php
/*
Template Name: Pagina Singola
*/
?>

<?php get_header(); ?>
  <div class="content">
    <?php $id = 48; ?>
    <article id="<?php echo get_post_field("post_name", $id); ?>" class="main-page">
      <div class="title title--main-page col-sm-6">
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
        <a class="main-page__button" target="_blank" href="https://docs.google.com/a/webdebs.org/forms/d/11gvSPQ4h1dHzILhnmtp1iNhI62iNCKI-FM2OR3ttZ_k/viewform">
          Send now!
        </a>
      </div>
    </article>
  </div>
<?php get_footer(); ?>