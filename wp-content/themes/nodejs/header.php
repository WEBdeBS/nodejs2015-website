<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      <?php wp_title("|", true, "right"); ?>
      <?php bloginfo("name"); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>">
    <?php wp_head(); ?>
	  <script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-46921107-1']);
		  _gaq.push(['_setDomainName', 'nodejsconf.it']);
		  _gaq.push(['_setAllowLinker', true]);
		  _gaq.push(['_trackPageview']);
		  _gaq.push(function() {
		    var pageTracker = _gat._getTrackerByName();
		    var iframe = document.getElementById('myIFrame');
		    iframe.src = pageTracker._getLinkerUrl('http://www.eventbrite.it/tickets-external?eid=9509179211&ref=etckt&v=2');
		  });

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
  </head>
  <body>
    <div class="topbar">
      <a target="_blank" href="https://www.facebook.com/groups/webdebs/">
        <img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="">
      </a>
      <a target="_blank" href="https://twitter.com/webdebresa">
        <img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="">
      </a>
      <a target="_blank" href="http://vimeo.com/user8514282">
        <img src="<?php echo get_template_directory_uri(); ?>/images/vimeo.png" alt="">
      </a>
    </div>
    <div class="header">
      <img class="header__knot" src="<?php echo get_template_directory_uri(); ?>/images/header-node-corner.png" alt="">
      <header class="header__title">
        <h1>
          - Node.js -
        </h1>
        <h2 class="desktop-header">
          Italian Conference - IV Edition
        </h2>
        <h2 class="phone-header">
          Italian Conference<span></span><br/><span></span>IV Edition
        </h2>
        <h3>
          10 October 2015 - Desenzano (BS)
        </h3>
      </header>
    </div>
    <nav class="nav">
      <?php wp_nav_menu(); ?>
      <div class="hr"></div>
    </nav>
