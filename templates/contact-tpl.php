<?php 

/*
  Template Name: Contact
*/

get_template_part('includes/header'); ?>

<div class="container-fluid">
  <div class="row">
  	<header class="main-header">
  		<h3><?php the_title();?></h3>
  	</header>
    <?php while(have_posts()):the_post();?>
		<div class="container"><?php the_content(); ?></div>
	<?php endwhile;?>
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_template_part('includes/footer'); ?>