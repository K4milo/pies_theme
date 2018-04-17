<?php
/*
Template Name: Listado de archivos
*/
get_template_part('includes/header');?>
<div class="container-fluid">
	<div class="row">
		<header class="page-head">
			<h2><?php the_title();?></h2>
		</header>
		<div class="row files-list">
			<?php
			$paged = (get_query_var('page'))?get_query_var('page'):1;
			//New archive
			$args = array(
				'post_type'      => 'documento',
				'posts_per_page' => '18',
			);
			$the_query = new WP_Query($args);?>
			<?php
			if ($the_query->have_posts()):while ($the_query->have_posts()):
			$the_query->the_post();// run the loop ?>
				<article class="file-item col-md-3">
					<div class="file-wrapper">
						<a href="<?php the_permalink();?>" target="_blank">
							<h3><?php echo the_title();?></h3>
						</a>
						<div class="btn cta_file">
							<a href="<?php the_permalink();?>" target="_blank">Ver Archivo</a>
						</div>
					</div>
				</article>
			<?php endwhile;?>
			<?php  else :?>
			<p class="no-files"><?php _e('No existen archivos.');?></p>
			<?php endif;?>
		</div>
	</div><!-- /.row -->
</div><!-- /.container -->
<?php get_template_part('includes/footer');?>