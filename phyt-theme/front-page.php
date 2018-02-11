<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <h1>Hello there.</h1>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
