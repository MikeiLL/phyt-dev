<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/careers/hero'); ?>
<section class="partners__content">
  <div class="container ">
      <div class="row">
        <div class="col-12">
          <section class="careers__content">
            <h2>Phyt Rehab is always looking for capable, qualified and compassionate people to join our team. Use the search function below to find openings by geographic area.</h2>
            Our recruitment team is always accepting resumes and can help identify positions for qualified individuals. Please submit your contact information below.
          </section>
         <?php get_template_part('templates/content', 'page'); ?>
        </div>
    </div>
  </div>
</section>

<?php endwhile; ?>
