<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/front_page/hero'); ?>
  <?php get_template_part('templates/front_page/services'); ?>
  <?php get_template_part('templates/front_page/nodes'); ?>
  <?php get_template_part('templates/front_page/get_in_touch'); ?>
<?php endwhile; ?>
