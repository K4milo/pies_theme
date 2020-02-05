<?php
/*
Template Name: We Do
*/
get_template_part('includes/header');
while (have_posts()):the_post()?>

<div class="container-fluid que-hacemos">

	<div class="row">
		<header class="main-header">
			<h2><?php the_title();?></h2>
		</header>
		<div class="container">
			<div class="col-md-6 infrestructura text-center">
<a><img id="hb" src="<?php bloginfo('template_url')?>/img/icons/herramienta-blanca.png" alt="INFRAESTRUCTURA" name="hb"></a>
<a><img id="ha" src="<?php bloginfo('template_url')?>/img/icons/herramienta-amarilla.png" alt="INFRAESTRUCTURA"name="ha"></a>
<div  class="the-icon">
	<?php if(ICL_LANGUAGE_CODE=='es'): ?>
			<h4 id="infra">INFRAESTRUCTURA</h4>
	<?php else: ?>
			<h4 id="infra"> INFRASTRUCTURE</h4>
	<?php endif;?>

</div>
			</div>
			<div class="col-md-6 practicas-efectivas text-center">
<a><img id="la" src="<?php bloginfo('template_url')?>/img/icons/libro-amarillo.png" alt="EDUCACIÓN"></a>
<a><img id="lb" src="<?php bloginfo('template_url')?>/img/icons/libro-blanco.png" alt="EDUCACIÓN"> </a>
<div  class="the-icon">
	<?php if(ICL_LANGUAGE_CODE=='es'): ?>
				<h4 id="pract">PRÁCTICAS EFECTIVAS</h4>
	<?php else: ?>
			<h4 id="infra"> EFFECTIVE PRACTICES</h4>
	<?php endif;?>

</div>
			</div>
		</div>

		</div><!-- /.row -->
	<div class="projects container">
			<?php //loop projcts
			$cont=0;

				while (have_rows('proyectos')):the_row();
				$cont++;
				?>
				<div id="info<?php echo $cont;?>" class="content-project">
					<div class="tittle-infographics">
						<?php the_sub_field('titulo_infografia'); ?>
					</div>
					<div class="infographic">
						<img src="<?php the_sub_field('infografia'); ?>" alt="">
					</div>
				</div>

			<?php endwhile;?>
		</div>
					<div class="container-fluid">
						<div class="row">
							<header class="main-header">
								<?php if(ICL_LANGUAGE_CODE=='es'): ?>
									<h2>ALIANZAS</h2>
								<?php else: ?>
									<h2>ALLIANCES</h2>
								<?php endif;?>

								<!--<p>Implementamos proyectos con nuestros aliados</p>-->
							</header>
							</div>
						<div class="row" id="partners-container2">
							<div class="container">
								<div class="impact-items2 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
									<?php
										//Loop the value items
										while( have_rows('alianzas')): the_row();
									?>

										<div class="item wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
											<figure><img src="<?php the_sub_field('logo'); ?>" alt="pies descalzos partners" width="200px" height="auto"></figure>
										</div>
									<?php
										endwhile;
									?>
								</div>
							</div>
						</div><!-- /.row -->
					</div>
					<div class="row ubication">
						<section id="cd-ubication" class="container">
							<header class="main-header">
								<?php if(ICL_LANGUAGE_CODE=='es'): ?>
									<h3>Dónde Estamos</h3>
								<?php else: ?>
									<h3>Where we are?</h3>
								<?php endif;?>
							</header>
							<div class="col-md-7 ubi-items">
								<?php //loop impact items
								while (have_rows('items_ubicacion')):the_row();?>
								<div class="ubi-block">
									<div class="cd-img visible-xs">
											<a href="<?php the_sub_field('vinculo');?>" target="_blank">
												<img src="<?php the_sub_field('pictograma');?>" class="color" alt="<?php the_title();?>" />
											</a>
										</div> <!-- cd-timeline-img -->
									<div class="cd-content">
										<?php the_sub_field('text_body');?>
									</div> <!-- cd-timeline-content -->
										<div class="cd-img hidden-xs">
											<a href="<?php the_sub_field('vinculo');?>" target="_blank">
												<img src="<?php the_sub_field('pictograma');?>" class="color" alt="<?php the_title();?>" />
											</a>
										</div> <!-- cd-timeline-img -->
											</div> <!-- cd-timeline-block -->
											<?php endwhile;?>
										</div>
										<div class="col-md-5 img-map hidden-xs">

												<img src="<?php bloginfo('template_url')?>/img/misc/mapa-colombia.png" alt="Mapa de colombia ">

										</div>
									</section>
								</div>
								<div class="row gestion">
									<section id="cd-gestion" class="container">
										<header class="main-header">
											<?php if(ICL_LANGUAGE_CODE=='es'): ?>
												<h3>Informe de Gestión</h3>
											<?php else: ?>
												<h3>Management report</h3>
											<?php endif;?>
										</header>
										<ul class="nav nav-tabs">
											<?php //loop impact items
											$counter = 0;
											while (have_rows('items_gestion')):the_row();?>
											<li>
												<a data-toggle="tab" href="#menu<?php echo $counter;?>"><?php the_sub_field('ubicacion');
												?></a>
											</li>
											<?php $counter++;
											endwhile;
										?></ul>

										<header class="main-header subtitle">
											<?php if(ICL_LANGUAGE_CODE=='es'): ?>
												<h4>Niños y jóvenes beneficiados por año</h4>
											<?php else: ?>
												<h4>Children and young people benefited.</h4>
											<?php endif;?>
										</header>

										<div class="tab-content">
											<?php //loop impact items
											$counter2 = 0;
											while (have_rows('items_gestion')):the_row();?>
											<div id="menu<?php echo $counter2;?>" class="tab-pane fade">
												<?php
												$counter3 = 0;
												while (have_rows('informacion_por_ano')):the_row();?>
												<div class="text-item">
													<p><?php the_sub_field('texto');?></p>
												</div>
												<div class="kn-cont">
													<input class="knob knob-<?php echo $counter3;?>" value="<?php the_sub_field('cifra_grafico');?>" data-readOnly="true" data-perc="<?php the_sub_field('cifra_grafico');?>">
													<span><?php the_sub_field('cifra_numeros');?></span>
												</div>
												<?php $counter3++;
												endwhile;
												?>
											</div>
											<?php $counter2++;
											endwhile;
											?>
										</div>
									</section>
									<section id="inf-gestion" class="container">
										<header class="main-header">
											<?php if(ICL_LANGUAGE_CODE=='es'): ?>
											<h3>Ver Informes</h3>
											<?php else:?>
											<h3>See reports</h3>
											<?php endif; ?>
										</header>
										<ul class="inform-tabs">
											<?php //loop impact items
											$counter = 0;
											while (have_rows('informes_gestion')):the_row();?>
											<li>
												<a href="#myModa<?php echo $counter; ?>" data-toggle="modal" data-target="#myModa<?php echo $counter; ?>" ><?php the_sub_field('ano');?></a>
											</li>

											<!-- Modal -->
											<div id="myModa<?php echo $counter; ?>" class="modal fade" role="dialog">
												<div class="modal-dialog modal-lg">
													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title"><?php the_sub_field('ano');?></h4>
														</div>
														<div class="modal-body">
															<?php the_sub_field('iframe_archivo');?>
														</div>
													</div>
												</div>
											</div>

											<?php $counter++;
											endwhile;
										?></ul>
									</section>
								</div>
							</div><!-- /.container -->
							<?php endwhile;
							get_template_part('includes/footer');?>
