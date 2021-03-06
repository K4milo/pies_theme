<?php 

/*
  Template Name: History
*/

get_template_part('includes/header'); 

	while(have_posts()):the_post();
?>

<div class="container-fluid">
  <div class="row">
  	<header class="main-header">
  		<h3><?php the_title();?></h3>
  	</header>
  	<div class="history-timeline">
		<ul id="history-slider">
			<?php
				//loop impact items
				while( have_rows('eventos_historicos')): the_row();
			?>
				<li style="background-image: url(<?php the_sub_field('imagen_fondo'); ?>)" data-date="<?php the_sub_field('fecha'); ?>" >

					<div class="history-content"><div class="text-cond"><?php the_sub_field('texto_detalle'); ?></div><i></i></div>
				</li>
			<?php
				endwhile;
			?>
		</ul>
		<ul id="history-slider-mobile">
			<?php
				//loop impact items
				while( have_rows('eventos_historicos')): the_row();
			?>
				<li data-text="<?php the_sub_field('texto_detalle'); ?>">
					<header><?php the_sub_field('fecha'); ?></header>
					<div class="body-text"><?php the_sub_field('texto_detalle'); ?></div>
				</li>
			<?php
				endwhile;
			?>
		</ul>
	</div><!--/eof card items-->   
  </div><!-- /.row -->
</div><!-- /.container -->

<?php 
	endwhile;
	get_template_part('includes/footer'); 
?>
