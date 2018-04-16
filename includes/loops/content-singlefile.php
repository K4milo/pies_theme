<?php
/*
The Single Posts Loop
=====================
 */
?>

<?php if (have_posts()):
    while (have_posts()):the_post();?>
    <header>
        <h2>
            <a href="/">
                <span class="back-icon"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
            </a>
            <?php the_title(); ?>
        </h2>
    </header>
    <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
        <section class="post-iframe">
            <object data="<?php the_field('archivo_anidado');?>" type="application/pdf">
                <embed src="<?php the_field('archivo_anidado');?>" type="application/pdf" />
            </object>
        
        </section>
    </article>
<?php //comments_template('/includes/loops/comments.php'); ?>
<?php endwhile;?>
<?php endif;?>