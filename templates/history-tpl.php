<?php 

/*
  Template Name: History
*/

get_template_part('includes/header'); 

	while(have_posts()):the_post();
?>

<div class="container-fluid">
  <div class="row">
  	<div class="history-timeline">
		<ul id="history-slider">
			<?php
				//loop impact items
				while( have_rows('eventos_historicos') ): the_row();
			?>
				<li style="background-image: url(<?php the_sub_field('imagen_fondo'); ?>)">
					<div class="text-body">
						<?php the_sub_field('texto_detalle'); ?>
					</div>
				</li>
			<?php
				endwhile;
			?>
		</ul>

		<ul class="pager">
			<?php
				//loop impact items
				while( have_rows('eventos_historicos') ): the_row();
			?>
				<li>
					<div class="date">
						<?php the_sub_field('fecha'); ?>
					</div>
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
