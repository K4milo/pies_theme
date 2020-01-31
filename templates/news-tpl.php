<?php

	// Filter component by date
	setlocale(LC_ALL,"es_ES");

	$month = $_POST['register_month'];
	$year = $_POST['register_year'];
	$cat = $_POST['register_cat'];
	$date = DateTime::createFromFormat('!m', $month);
	$monthName = strftime('%B', mktime(0, 0, 0, $month));
	$args;
	//$paged = (get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

?>
<?php
/*
Template Name: News
*/
get_template_part('includes/header');?>
<div class="container-fluid">
	<div class="row">
		<header class="page-head">
			<h2><?php the_title();?></h2>
		</header>
		<div class="wrapper-form filter">
			<form id="FilterTop" action="<?php the_permalink()?>" method="post">
				<div class="form-item form-item--select">
					<select required name="register_cat">
						<option value="">Categoría</option>
						<option value="all">Todas</option>
						<option value="asocajas">proyectos</option>
						<option value="afiliadas">Afiliadas</option>
					</select>
				</div>
				<div class="form-item form-item--select">
					<select required name="register_month">
						<option value="">Mes</option>
						<option value="01">Enero</option>
						<option value="02">Febrero</option>
						<option value="03">Marzo</option>
						<option value="04">Abril</option>
						<option value="05">Mayo</option>
						<option value="06">Junio</option>
						<option value="07">Julio</option>
						<option value="08">Agosto</option>
						<option value="09">Septiembre</option>
						<option value="10">Octubre</option>
						<option value="11">Noviembre</option>
						<option value="12">Diciembre</option>
					</select>
				</div>
				<div class="form-item form-item--select">
					<select required name="register_year">
						<option value="">Año</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
					</select>
				</div>

				<div class="form-item form-item--actions">
					<span><input type="submit" value="Filtrar"></span>
					<span><a href="<?php the_permalink()?>" class="reset-form">Reiniciar Filtro</a></span>
				</div>
			</form>
		</div>
		<div class="the-search">
			<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url('/'); ?>">
				<div>
					<input type="text" value="" name="s" id="s" />
					<input type="submit" id="searchsubmit" value='' />
				</div>
			</form>

		</div>
		<div class="row news-list no-gutter">
			<?php
			$paged = (get_query_var('page'))?get_query_var('page'):1;
			//New archive
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => '8',
				'paged'          => $paged,
				'page'           => $paged,
			);
			$the_query = new WP_Query($args);?>
			<?php
			if ($the_query->have_posts()):while ($the_query->have_posts()):
			$the_query->the_post();// run the loop ?>
				<article class="new-item col-md-3" style="background-image:url(<?php the_post_thumbnail_url('full')?>)">
					<a href="<?php the_permalink();?>" class="full-link"></a>
					<a href="<?php the_permalink();?>">
						<h3><?php echo the_title();?></h3>
					</a>
					<div class="excerpt">
						<?php the_excerpt();?>
					</div>
				</article>
			<?php endwhile;?>
			<?php
			if (function_exists(custom_pagination)) {
				custom_pagination($the_query->max_num_pages, "", $paged);
			}
			?>
			<?php  else :?>
			<p><?php _e('No existen noticias.');?></p>
			<?php endif;?>
		</div>
	</div><!-- /.row -->
</div><!-- /.container -->
		<?php get_template_part('includes/footer');?>
