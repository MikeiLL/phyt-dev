<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<div style="container">
  <div class="row">
    <div class="col-12 col-md-8">
      <h1>Lorem ipsum dolor sit amet, consectetur Daisy elit.</h1>
      <h2>Duo Reges: constructio interrete. Igitur neque stultorum quisquam beatus neque sapientium non beatus. Etsi qui potest intellegi aut cogitari esse aliquod animal, quod se oderit?</h2>
    </div>
    <div class="col-12 col-md-4 pt-4">
      <img class="img-fluid" alt="Bio Picture" src="<?= get_template_directory_uri(); ?>/dist/images/Woman-and-online-ideas.jpg">
    </div>
  </div>
</div>
    <p>Quas enim kakaw Graeci appellant, vitia malo quam malitias nominare. Eaedem res maneant alio modo. Occultum facinus esse potuerit, gaudebit; </p>

    <p>Rhetorice igitur, inquam, nos mavis quam dialectice disputare? Vitae autem degendae ratio maxime quidem illis placuit quieta. Ne amores quidem sanctos a sapiente alienos esse arbitrantur. Eam tum adesse, cum dolor omnis absit; Si verbum sequimur, primum longius verbum praepositum quam bonum. Cupiditates non Epicuri divisione finiebat, sed sua satietate. Quid loquor de nobis, qui ad laudem et ad decus nati, suscepti, instituti sumus? Non ego tecum iam ita iocabor, ut isdem his de rebus, cum L. Sed tamen omne, quod de re bona dilucide dicitur, mihi praeclare dici videtur. </p>

  <section class="states-map container-fluid">
    <img class="full-size" alt="Map of States with Phyt Presence" src="<?= get_template_directory_uri(); ?>/dist/images/states-map.png">
  </section>
<?php endwhile; ?>
