<div class="container-fluid">
	<div class="row" id="impact-value-container-proyects">
		<div class="container">
			<div class="head-body">
				<header>
					<?php if(ICL_LANGUAGE_CODE=='es'): ?>
					<h2>PROYECTOS</h2>
					<h3>EN EJECUCIÓN</h3>
				<?php else: ?>
				<h2>PROJECTS</h2>
				<h3>IN ACTION</h3>
			<?php endif; ?>
				</header>
			</div>

			<div class="row news-list no-gutter">
				<?php
				$paged = (get_query_var('page'))?get_query_var('page'):1;
				//New archive
				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => '4',
					'paged'          => $paged,
					'page'           => $paged,
					'tax_query' => array(
						array(
							'taxonomy' => 'category',
							'field'    => 'slug',
							'terms'    => 'proyectos',
			)
		)
				);
				$the_query = new WP_Query($args);?>
				<?php
				if ($the_query->have_posts()):while ($the_query->have_posts()):
				$the_query->the_post();// run the loop ?>
					<article class="new-item-proyect col-md-3" style="background-image:url(<?php the_post_thumbnail_url('full')?>);height: 600px;">
						<a href="<?php the_permalink() ?>"><h2>PROYECTO DESTACADO</h2></a>
					</article>
				<?php
				wp_reset_query();
			 endwhile;?>

				<?php endif;?>
			</div>
		</div>

	</div><!-- /.row -->
</div><!-- /.container -->
