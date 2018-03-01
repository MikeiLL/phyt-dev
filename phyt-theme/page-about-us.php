<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
<section class="partners__content">
  <div class="container ">
      <div class="row">
        <div class="col-12">

          <h1>Phyt Rehab is a national full service rehabilitation management organization led by a team of rehabilitation therapists who are experts in the totality of regulatory and compliance issues particular to the rehabilitation facility environment.</h1>

<h2>Phyt is dedicated to providing innovative clinical, management, billing, and information technology solutions to the post-acute care continuum.</h2>

<p>With over 35 years of experience, Phyt Rehab embraces the ever-changing needs of healthcare, working with patients and partners to continuously deliver comprehensive rehabilitation programs.</p>


        </div>

      </div>


    <section class="states-map container-fluid">
      <img class="img-fluid" alt="Bio Picture" src="<?= get_template_directory_uri(); ?>/dist/images/smaller-nodes.png">
    </section>


  </div>
</section>


<?php endwhile; ?>
