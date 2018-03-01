<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/about_us/hero'); ?>
<section class="partners__content">
  <div class="container ">
      <div class="row mt-1">
        <div class="col-12">

          <h2>Phyt Rehab is a national full service rehabilitation management organization led by a team of rehabilitation therapists who are experts in the totality of regulatory and compliance issues particular to the rehabilitation facility environment.</h2>

            <div class="row">

              <div class="col-12 col-md-6">


                  <p>Phyt is dedicated to providing innovative clinical, management, billing, and information technology solutions to the post-acute care continuum.</p>

                  <ul class="list-checkbox partners__list-checkbox partners__phytsquad-list">
                    <li>Integrated Care Delivery</li>
                    <li>Proactive Team Approach</li>
                    <li>Quality Driven Care</li>
                    <li>Compliance Focused</li>
                    <li>Cost Effective Solutions</li>
                  </ul>

                  <p>With over 35 years of experience, Phyt Rehab embraces the ever-changing needs of healthcare, working with patients and partners to continuously deliver comprehensive rehabilitation programs.</p>

              </div> <!-- // \col -->

              <div class="col-12 col-md-6">
               <img src="<?= get_template_directory_uri(); ?>/dist/images/about-us-final.png" class="img-fluid partners__img" alt="Vertical Nodes with Caregiver and Patient" />
              </div>

            </div> <!-- // \row -->


        </div>

      </div>

  </div>
</section>


<?php endwhile; ?>
