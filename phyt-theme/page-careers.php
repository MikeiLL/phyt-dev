<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/careers/hero'); ?>
<section class="partners__content">
  <div class="container ">
      <div class="row">
        <div class="col-12">
         <?php get_template_part('templates/content', 'page'); ?>
        </div>
    </div>
  </div>
</section>

<?php endwhile; ?>
