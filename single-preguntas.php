<?php get_template_part('includes/header'); ?>

<div class="container-fluid single-question">

  <section class="single-question__hero row">
    <article class="single-question__hero--text container">
      <h2>¡Tengo una pregunta!</h2>
      <h3><?php the_title(); ?></h3>
    </article>
  </section>
  
  <?php
    if(has_post_thumbnail()):
  ?>

  <section class="single-question__thumb row">
    <figure class="single-question__thumb-wrapper container">
      <?php the_post_thumbnail('full'); ?>
    </figure>
  </section>

  <?php endif; ?>

  <section class="single-question__content row">
    <article class="single-question--comments container">
      <header>
        <h3>Respuesta</h3>
      </header>
      <?php comments_template(); ?>
    </article>
  </section>

</div><!-- /.container -->

<?php get_template_part('includes/footer'); ?>