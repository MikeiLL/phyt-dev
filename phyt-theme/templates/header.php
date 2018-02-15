<?php
use  Roots\Sage\HeroRender;
?>
<div class="sticky-top">
  <div class="super-header clearfix">
    <span class="float-right"><a href="mailto:info@phytrehab.com">info@phytrehab.com</a></span><span class="float-right"><a href="tel:+8885753483">1.888.575.3483</a></span>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><img alt="<?php bloginfo('name'); ?> logo" src="<?= get_template_directory_uri(); ?>/dist/images/phyt-logo.png"><span class="sr-only">Home</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
        endif;
        ?>
    </div>
  </nav>
</div><?php // TODO consider adding if (HeroRender\phyt_has_hero()) HeroRender\phyt_get_hero(); ?>


