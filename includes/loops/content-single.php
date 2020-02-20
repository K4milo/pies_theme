<?php
/*
The Single Posts Loop
=====================
 */
?>

<?php if (have_posts()):while (have_posts()):the_post();?>
    <header>
      <?php if(ICL_LANGUAGE_CODE=='es'): ?>
        <a href="/noticias/">
          <img src="https://fundacionpiesdescalzos.com/wp-content/uploads/2020/02/Recurso-34.png" alt="Smiley face">
          <h3>volver</h3>
        </a>
      <?php else: ?>
        <a href="/en/news/">
          <img src="https://fundacionpiesdescalzos.com/wp-content/uploads/2020/02/Recurso-34.png" alt="Smiley face">
          <h3>Return</h3>
        </a>
      <?php endif;?>
        <h2>
            <?php the_title()?>
        </h2>
    </header>
    <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
        <section class="post-head">

                      <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                        <h5>
                          Publicado el <?php the_time('j F, Y'); ?>
                        </h5>
                      <?php else: ?>
                        <h5>
                          Posted on <?php the_time('j F, Y'); ?>
                        </h5>
                      <?php endif;?>
          <hr>
          <div class="intro">
          	<?php the_excerpt();?>
          </div>
		<?php the_post_thumbnail('full');?>

        </section>
        <section class="text-body">

<?php the_content()?>
</section>
    </article>
<?php //comments_template('/includes/loops/comments.php'); ?>
<?php endwhile;?>
<?php  else :get_template_part('includes/loops/content', 'none');?>
<?php endif;?>
