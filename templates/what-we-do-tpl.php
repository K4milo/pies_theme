<?php
/*
Template Name: We Do
*/
get_template_part('includes/header');
while (have_posts()):the_post()?>
<div class="container-fluid">
	<div class="row">
		<header class="main-header">
			<h2><?php the_title();?></h2>
		</header>
		</div><!-- /.row -->
		<div class="row infographics">
			<header class="main-header">
				<h3>Modelo de Intervención Integral</h3>
			</header>
			<div class="the-infographics">
				<figure>
				<?php the_post_thumbnail('full');?></figure>
			</div>
			<section id="cd-timeline" class="container">
				<?php //loop impact items
				while (have_rows('items_infografia')):the_row();?>
				<div class="cd-timeline-block">
					<div class="cd-timeline-img">
						<img src="<?php the_sub_field('pictograma');?>" class="color" alt="<?php the_title();?>" />
						</div> <!-- cd-timeline-img -->
						<div class="cd-timeline-content">
							<?php the_sub_field('text_body');?>
							</div> <!-- cd-timeline-content -->
							</div> <!-- cd-timeline-block -->
						<?php endwhile;?></section>
					</div>
					<div class="row ubication">
						<section id="cd-ubication" class="container">
							<header class="main-header">
								<h3>Dónde Estamos</h3>
							</header>
							<div class="col-md-7 ubi-items">
								<?php //loop impact items
								while (have_rows('items_ubicacion')):the_row();?>
								<div class="ubi-block">
									<div class="cd-content">
										<?php the_sub_field('text_body');?>
										</div> <!-- cd-timeline-content -->
										<div class="cd-img">
											<a href="<?php the_sub_field('vinculo');?>" target="_blank">
												<img src="<?php the_sub_field('pictograma');?>" class="color" alt="<?php the_title();?>" />
											</a>
											</div> <!-- cd-timeline-img -->
											</div> <!-- cd-timeline-block -->
											<?php endwhile;?>
										</div>
										<div class="col-md-5 img-map">
											
												<img src="<?php bloginfo('template_url')?>/img/misc/mapa-colombia.png" alt="Mapa de colombia ">
											
										</div>
									</section>
								</div>
								<div class="row gestion">
									<section id="cd-gestion" class="container">
										<header class="main-header">
											<h3>Informe de Gestión</h3>
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
										<div class="tab-content">
											<?php //loop impact items
											$counter2 = 0;
											while (have_rows('items_gestion')):the_row();?>
											<div id="menu<?php echo $counter2;?>" class="tab-pane fade">
												<h3>Niños y jóvenes beneficiados por año</h3>
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
											<h3>Ver Informes</h3>
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