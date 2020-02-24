
<?php
/*
Template Name: News
*/

	// Filter component by date



	setlocale(LC_ALL,"es_ES");

	$month = $_POST['register_month'];
	$year = $_POST['register_year'];
	$cat = $_POST['register_cat'];
	$date = DateTime::createFromFormat('!m', $month);
	$monthName = strftime('%B', mktime(0, 0, 0, $month));
	$args;
	$paged = (get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

?>
<?php get_template_part('includes/header'); ?>
<section id="MainPost">
	<div class="row news-list no-gutter">
		<header class="main-header">
				<h2><?php the_title();?></h2>
		</header>

		<?php if(ICL_LANGUAGE_CODE=='es'): ?>
			<div class="wrapper-form filter">
				<form id="FilterTop" action="<?php the_permalink()?>" method="post">
					<div class="form-item form-item--select">
						<select required name="register_cat">
							<option value="">Categoría</option>
							<option value="all">Todas</option>
							<option value="asocajas">proyectos</option>
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
							<option value="2019">2020</option>
						</select>
					</div>

					<div class="form-item form-item--actions">
						<span><input type="submit" value="Filtrar"></span>
						<span><a href="<?php the_permalink()?>" class="reset-form">Reiniciar Filtro</a></span>
					</div>
				</form>
			</div>

		<?php else: ?>
			<div class="wrapper-form filter">
				<form id="FilterTop" action="<?php the_permalink()?>" method="post">
					<div class="form-item form-item--select">
						<select required name="register_cat">
							<option value="">Category</option>
							<option value="all">all</option>
							<option value="asocajas">Projects</option>
						</select>
					</div>
					<div class="form-item form-item--select">
						<select required name="register_month">
							<option value="">Month</option>
							<option value="01">January</option>
							<option value="02">February</option>
							<option value="03">March</option>
							<option value="04">April</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">August</option>
							<option value="09">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
					</div>
					<div class="form-item form-item--select">
						<select required name="register_year">
							<option value="">Year</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2019">2020</option>
						</select>
					</div>

					<div class="form-item form-item--actions">
						<span><input type="submit" value="Filter"></span>
						<span><a href="<?php the_permalink()?>" class="reset-form">Reset Filter</a></span>
					</div>
				</form>
			</div>
		<?php endif;?>

		<div id="postsWrapper" class="pod-news--wrapper">

			<?php
				// Filter component by date

				if($month && $year && $cat) {

					if($cat != 'all'){
						$args = array (
							'post_type' => 'post',
							'posts_per_page' => 8,
							'paged'          => $paged,
							'category_name' => $cat,
							'date_query' => array(
							    array(
							    	'column'  => 'post_date',
							        'after' => $year.'-'.$month.'-'.'01',
							        'before' => $year.'-'.$month.'-'.'30',
							        'inclusive' => true,
							    ),
							),
						);
					} else {
						$args = array (
							'post_type' => 'post',
							'posts_per_page' => 8,
							'paged'          => $paged,
							'date_query' => array(
							    array(
							    	'column'  => 'post_date',
							        'after' => $year.'-'.$month.'-'.'01',
							        'before' => $year.'-'.$month.'-'.'30',
							        'inclusive' => true,
							    ),
							),
						);
					}

				} else {

					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 8,
						'paged'          => $paged,
					);
				}


				$query = new WP_Query( $args );



				if($query->have_posts()):

				while ( $query->have_posts() ) : $query->the_post();

					$def = '#d84e65';
					$color = get_field('color_item');
					$hover;

					if ($color) {
						$hover = get_field('color_item');
					} else {
						$hover = $def;
					}

			?>
			<article class="new-item col-md-3" style="background-image:url(<?php the_post_thumbnail_url('full')?>)">
				<a href="<?php the_permalink();?>" class="full-link"></a>
				<a href="<?php the_permalink();?>">
					<h3><?php echo the_title();?></h3>
				</a>
				<div class="excerpt">
					<?php the_excerpt();?>
				</div>
			</article>
			<?php
				endwhile;

			if (function_exists('custom_pagination')) {
					custom_pagination($query->max_num_pages, "", $paged);
				}

				wp_reset_query();
				else:
			?>
			<?php if(ICL_LANGUAGE_CODE=='es'): ?>
				<div class="no-content">
					<h2>--No existen noticias con ese criterio de fechas o categoría, por favor intenta de nuevo</h2>
				</div>
			<?php else: ?>
				<h2>There is no news with that criteria of dates or category, please try again</h2>
			<?php endif;?>

			<?php endif; ?>

		</div>
	</div>
</section>
	<?php get_template_part('includes/footer');?>
