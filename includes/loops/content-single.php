<?php
/*
The Single Posts Loop
=====================
 */
?>

<?php if (have_posts()):while (have_posts()):the_post();?>
    <header>
        <h2><a href="http://londonojp.com/pies-descalzos/noticias/"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> <?php the_title()?></h2>
    </header>
    <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
        <section class="post-head">
		<?php the_post_thumbnail('full');?>
<div class="intro">
	<?php the_excerpt();?>
</div>
        </section>
        <section class="text-body">

<?php the_content()?>
</section>
    </article>
<?php //comments_template('/includes/loops/comments.php'); ?>
<?php endwhile;?>
<?php  else :get_template_part('includes/loops/content', 'none');?>
<?php endif;?>
