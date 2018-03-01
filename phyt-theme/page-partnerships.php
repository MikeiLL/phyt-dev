<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/partners/hero'); ?>
  <?php get_template_part('templates/partners/body-copy'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
