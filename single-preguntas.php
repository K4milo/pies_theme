<?php

  $nombre= get_field('student_name');
  $role = get_field('student_role');
  $ciudad = get_field('student_city');

 ?>

<?php get_template_part('includes/header'); ?>

<div class="container-fluid single-question">

  <section class="single-question__hero row">
    <article class="single-question__hero--text container">
      <h2>¡Tengo una pregunta!</h2>
      <h3><?php the_title(); ?></h3>
    </article>
  </section>

  <section>
    <div class="descripcion container">
      <div class="descripcion-title">
        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
        <?php if(have_posts()) : the_post();
          $post_type = get_post_type(get_the_ID());
          $taxonomies = get_object_taxonomies($post_type);
          $taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names"));
            if(!empty($taxonomy_names)) :
              $cont=0;
               foreach($taxonomy_names as $tax_name) :
                foreach($taxonomies as $tax_name2) :
                    $cont++;
                   ?>

                 <p class="item<?php echo $cont; ?>"> <?php echo "<strong>"; ?> <?php echo $tax_name2; ?><?php echo ":"; ?> <?php echo "</strong>"; ?> <?php echo $tax_name; ?> </p>
               <?php endforeach;
               endforeach;

            endif;
          endif;  ?>
          <p> <strong>Ciudad:</strong>  <?php echo $ciudad; ?></p>
          <?php if ($role): ?>
          <p><strong>Quién pregunta:</strong>  <?php echo $role; ?></p>
        <?php endif; ?>
      </div>
      <div class="descripcion-content">
        <?php the_content(); ?>
      </div>
    </div>

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
  <section class="boton-respuesta">
      <a href="https://fundacionpiesdescalzos.com/wp-admin/">Dar respuesta</a>

  </section>

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
