<?php

/*
Template Name: Donation
 */

get_template_part('includes/header');

while (have_posts()):the_post();

?>
<div class="container-fluid donation-page">
  <header class="page-head">
<?php the_content();?>
</header>
  <div class="row">
  	<div class="container">
		<ul class="nav nav-tabs">
			<li class="active">
				<a data-toggle="tab" href="#home">
					<i></i>Dejar<br/> <strong>Una Huella</strong>
				</a>
			</li>
			<li>
				<a data-toggle="tab" href="#menu1">
					Dejar mi Huella<br/> <strong>Mensualmente</strong>
				</a>
			</li>
			<li>
				<a data-toggle="tab" href="#menu2">
					Compartir<br/> <strong>mi Huella</strong>
				</a>
			</li>
			<li>
				<a data-toggle="tab" href="#menu3">
					Regalar <br/> <strong>Una Huella</strong>
				</a>
			</li>
		</ul>

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<div class="first text-body">
<?php the_field('texto_introductorio_1');?>
</div><!--/texto intro-->
	  			<div class="impact-items">
<?php
//loop impact items
while (have_rows('items_de_impacto_1')):the_row();
?>
	  					<div class="col-md-6 item">
	  						<figure class="tmb">
	  							<img src="<?php the_sub_field('icono');?>" alt="<?php the_title();?>">
	  						</figure>
	  						<div class="text-body">
	  							<h3><?php the_sub_field('encabezado');?></h3>
<?php the_sub_field('texto');?>
</div>
	  					</div>
<?php
endwhile;
?>
</div>
	  			<div class="pay-btns">
	  				<header>
	  					<h3>Elige cómo dejar tu huella</h3>
	  				</header>
<?php
$counter = 1;
//loop impact items
while (have_rows('metodos_pago')):the_row();
?>
	  					<div class="item logo-<?php echo $counter;?>">
	  						<figure class="logo logo-<?php echo $counter;?>">
	  							<a href="<?php the_sub_field('vinculo');?>" target="_blank">
	  								<img src="<?php the_sub_field('logo');?>" alt="<?php the_title();?>">
	  							</a>
	  						</figure>
	  					</div>
<?php
$counter++;
endwhile;
?>
	  				<div class="item">
  						<figure class="logo logo-cons">
  							<a href="#modalCon" data-toggle="modal" data-target="#modalCon" >
  								<img src="<?php bloginfo('template_url');?>/img/icons/the-red-mail.png" alt="<?php the_title();?>">
  							</a>
  						</figure>
  					</div>
	  			</div>
			</div>
			<div id="menu1" class="tab-pane fade">
				<div class="first text-body">
<?php the_field('texto_introductorio_2');?>
</div><!--/texto intro-->
	  			<div class="impact-items">
<?php
//loop impact items
while (have_rows('items_de_impacto_2')):the_row();
?>
	  					<div class="col-md-6 item">
	  						<figure class="tmb">
	  							<img src="<?php the_sub_field('icono');?>" alt="<?php the_title();?>">
	  						</figure>
	  						<div class="text-body">
	  							<h3><?php the_sub_field('encabezado');?></h3>
<?php the_sub_field('texto');?>
</div>
	  					</div>
<?php
endwhile;
?>
</div><!--/eof items impact-->
	  			<div class="pay-btns">
	  				<header>
	  					<h3>Elige cómo dejar tu huella</h3>
	  				</header>
<?php
$counter = 1;
//loop impact items
while (have_rows('metodos_pago')):the_row();
?>
	  					<div class="item">
	  						<figure class="logo logo-<?php echo $counter;?>">
	  							<a href="<?php the_sub_field('vinculo');?>" target="_blank">
	  								<img src="<?php the_sub_field('logo');?>" alt="<?php the_title();?>">
	  							</a>
	  						</figure>
	  					</div>
<?php
$counter++;
endwhile;
?>
	  				<div class="item">
  						<figure class="logo logo-cons">
  							<a href="#modalCon" data-toggle="modal" data-target="#modalCon" >
  								<img src="<?php bloginfo('template_url');?>/img/icons/the-red-mail.png" alt="<?php the_title();?>">
  							</a>
  						</figure>
  					</div>
	  			</div>
			</div>
			<div id="menu2" class="tab-pane fade">
				<div class="first text-body">
<?php the_field('texto_introductorio_3');?>
</div><!--/texto intro-->
	  			<div class="voluntier-items">
<?php
//loop impact items
while (have_rows('items_voluntariado')):the_row();
?>
	  					<div class="item">
	  						<header>
	  							<h3><?php the_sub_field('titulo');?></h3>
	  						</header>
	  						<figure class="tmb">
	  							<img src="<?php the_sub_field('icono');?>" alt="<?php the_title();?>">
	  							<div class="text-body">
<?php the_sub_field('texto');?>
</div>
	  						</figure>
	  					</div>
<?php
endwhile;
?>
</div><!--/eof impact-items-->
	  			<div class="aditional">
<?php the_field('contenido_adicional');?>
</div><!--/eof aditional-->
	  			<div class="ubication-lst">
	  				<header>
	  					<h3>Dónde puedes apoyar<br/>como voluntario</h3>
	  				</header>
	  				<ul>
<?php
//loop ubications
while (have_rows('ubicaciones')):the_row();
?>
	  					<li style="background-image: url(<?php the_sub_field('imagen_fondo');?>)">
	  						<div class="text-body">
<?php the_sub_field('texto_detalle');?>
</div>
	  					</li>

<?php
endwhile;
?>
</ul>
	  			</div><!--/eof ubication-->
	  			<div class="tab-form">
	  				<header>
	  					<h3>Formulario<br/>de inscripción</h3>
	  				</header>
<?php
$the_form = get_field('shortcode_formulario');
if ($the_form) {
	echo do_shortcode($the_form);
}
?>
</div><!--/eof form-->
	  			<div class="faqs">
	  				<header>
	  					<h3>Preguntas Frecuentes</h3>
	  				</header>
					<div class="panel-group">
						<div class="panel panel-default">
<?php
$counter = 0;
while (have_rows('preguntas_frecuentes')):the_row();
?>
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" href="#collapse<?php echo $counter;?>">
<?php the_sub_field('encabezado');?>
									</a>
								</h4>
							</div>
							<div id="collapse<?php echo $counter;?>" class="panel-collapse collapse">
<?php the_sub_field('respuesta');?>
</div>
<?php $counter++;
endwhile;
?>
</div>
					</div><!--/panel group-->
	  			</div><!--EOF FAQS-->
	  			<div class="impact-items">
<?php
//loop impact items
while (have_rows('items_de_impacto_3')):the_row();
?>
	  					<div class="col-md-6 item">
	  						<figure class="tmb">
	  							<img src="<?php the_sub_field('icono');?>" alt="<?php the_title();?>">
	  						</figure>
	  						<div class="text-body">
	  							<h3><?php the_sub_field('encabezado');?></h3>
<?php the_sub_field('texto');?>
</div>
	  					</div>
<?php
endwhile;
?>
</div><!--/eof items impact-->
			</div><!--/eof tab 3-->
			<div id="menu3" class="tab-pane fade">
				<div class="first text-body">
<?php the_field('texto_introductorio_4');?>
</div><!--/texto intro-->
	  			<div class="impact-items">
<?php
//loop impact items
while (have_rows('items_de_impacto_4')):the_row();
?>
	  					<div class="col-md-6 item">
	  						<figure class="tmb">
	  							<img src="<?php the_sub_field('icono');?>" alt="<?php the_title();?>">
	  						</figure>
	  						<div class="text-body">
	  							<h3><?php the_sub_field('encabezado');?></h3>
<?php the_sub_field('texto');?>
</div>
	  					</div>
<?php
endwhile;
?>
	  			</div><!--/eof impact items-->
	  			<div class="card-items">

	  				<div class="col-md-3 item icon">
	  					<img src="<?php the_field('icono_tarjetas');?>">
	  				</div>

<?php
//loop impact items
while (have_rows('informacion_tarjetas')):the_row();
?>
<div class="col-md-3 item info">
<?php the_sub_field('item_informativo');?>
</div>
<?php
endwhile;
?>

	  			</div><!--/eof card items-->
	  			<div class="bonus-items">

	  				<div class="col-md-3 item icon">
	  					<img src="<?php the_field('icono_bonos');?>">
	  				</div>

<?php
//loop impact items
while (have_rows('informacion_bonos')):the_row();
?>
<div class="col-md-3 item info">
<?php the_sub_field('item_informativo');?>
</div>
<?php
endwhile;
?>
</div><!--/eof card items-->

	  			<div class="bonus-timeline">
	  				<ul>
<?php
//loop impact items
while (have_rows('adquisicion_bonos')):the_row();
?>
		  					<li>
		  						<img src="<?php the_sub_field('icono');?>">
		  						<div class="text-body">
<?php the_sub_field('texto');?>
</div>
		  					</li>
<?php
endwhile;
?>
</ul>
	  			</div><!--/eof card items-->
	  			<div class="pay-btns">
	  				<header>
	  					<h3>Elige cómo dejar tu huella</h3>
	  				</header>
<?php
$counter = 1;
//loop impact items
while (have_rows('metodos_pago')):the_row();
?>
	  					<div class="item logo-<?php echo $counter;?>">
	  						<figure class="logo logo-<?php echo $counter;?>">
	  							<a href="<?php the_sub_field('vinculo');?>" target="_blank">
	  								<img src="<?php the_sub_field('logo');?>" alt="<?php the_title();?>">
	  							</a>
	  						</figure>
	  					</div>
<?php
$counter++;
endwhile;
?>
	  				<div class="item">
  						<figure class="logo logo-cons">
  							<a href="#modalCon" data-toggle="modal" data-target="#modalCon" >
  								<img src="<?php bloginfo('template_url');?>/img/icons/the-red-mail.png" alt="<?php the_title();?>">
  							</a>
  						</figure>
  					</div>
	  			</div>
			</div><!--/eof tab 4-->
		</div><!--/tab content-->
	</div><!--centered-->
  </div><!-- /.row -->
</div><!-- /.container -->

<!-- Modal -->
<div id="modalCon" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php bloginfo('template_url');?>/img/icons/letter-small.png" alt="<?php the_title();?>">
				<h4 class="modal-title">Consignación</h4>
			</div>
			<div class="modal-body">
				<p>
					Para donaciones en efectivo
				</p>
				<p>
					<b>
					Puedes consignar en Bancolombia
					Cuenta de Ahorros <br/>No. 209 658065-20
					Fundación Pies Descalzos
					</b>
				</p>
				<p>
					*No olvides enviar el comprobante
					de consignación al correo electrónico:
					<a href="mailto:webmaster@fpd.ong">webmaster@fpd.ong</a>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar X</button>
			</div>
		</div>
	</div>
</div>

<?php
endwhile;

get_template_part('includes/footer');?>
