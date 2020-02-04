<?php

/*
  Template Name: Home
*/

get_template_part('includes/header');

	while(have_posts()):the_post();
?>

	<div class="container-fluid">
	  <div class="row" id="video-container">
			<video autoplay loop id="video-background" muted plays-inline>
					<source src="<?php the_field('url_video')?>" type="video/mp4">
			</video>
	    <div class="container">
				<div class="copy-video wow fadeInLeft">
					<img src="<?php the_field('copy_video');?>" alt="<?php the_title(); ?>">
				</div>
			</div>
	  </div><!-- /.row -->
	</div><!-- /.container -->

	<div class="container-fluid">
	  <div class="row" id="infographics-container">
	    <div class="container">
	    	<div class="col-md-6 text wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="1s">
	    		<h2>
	    			<img src="<?php the_field('titulo_infografia');?>" alt="<?php the_title(); ?>">
	    		</h2>
	    		<div class="text-body wow fadeInLeft">
	    			<?php the_field('texto_infografia');?>
	    			<?php if(ICL_LANGUAGE_CODE=='es'): ?>
	    				<a href="/que-hacemos/" class="wow bounceIn" data-wow-duration="0.5s" data-wow-delay="1s">Conoce más ></a>
	    			<?php else:?>
	    				<a href="/en/what-we-do/" class="wow bounceIn" data-wow-duration="0.5s" data-wow-delay="1s">Learn more ></a>
	    			<?php endif; ?>
	    		</div>
	    	</div>
	    	<div class="col-md-6 image wow slideInOut" data-wow-duration="1s" data-wow-delay="1s">
	    		<img class="wow zoomIn" data-wow-duration="1.5s" data-wow-delay="1s" src="<?php the_field('imagen_infografia');?>" alt="<?php the_title(); ?>">
	    	</div>
	    </div>
	  </div><!-- /.row -->
	</div><!-- /.container -->

	<div class="container-fluid">
	  <div class="row" id="items-value-container">
	    <div class="container">
	    	<div class="head-body wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
	    		<?php the_field('texto_hover_main');?>
	    	</div>
	    	<div class="value-items no-gutter">
	    		<?php
	    			$counter;
	    			//Loop the value items
	    			while( have_rows('items_hover') ): the_row();
	    				//hover variables
	    				$init = get_sub_field('imagen_color');
	    				$hover = get_sub_field('imagen_bn');
	    		?>
	    			<div class="col-md-3 item wow slideInOut" data-wow-duration="1.5s" data-wow-delay="1s">
							<a href="<?php the_sub_field('vinculo'); ?>">
								<div class="front" style="background-image:url(<?php echo $init; ?>);"></div>
		    				<div class="back" style="background-image:url(<?php echo $hover; ?>);"></div>
		    				<figure class="wow bounceIn" data-wow-duration="0.5s" data-wow-delay="1s">
									<img lass="wow zoomIn" data-wow-duration="0.5s" data-wow-delay="1s" src="<?php the_sub_field('pictograma'); ?>" alt="shakira">
								</figure>
							</a>
	    				<div class="text-body">
	    					<?php the_sub_field('texto_imagen'); ?>
	    				</div>
	    			</div>
	    		<?php
	    			endwhile;
	    		?>
	    	</div>
	    </div>
	  </div><!-- /.row -->
	</div><!-- /.container -->
	<?php
get_template_part('includes/loops/proyects-home');
	 ?>
	<div class="container-fluid">
	  <div class="row" id="impact-value-container">
	    <div class="container">
	    	<div class="head-body">
	    		<header>
	    			<?php the_field('titulo_impacto');?>
	    		</header>
	    	</div>
	    	<div class="impact-items">
	    		<?php
	    			//Loop the value items
	    			while( have_rows('items_informativos') ): the_row();
	    		?>

	    			<div class="col-md-3 item wow bounceIn">
	    				<figure><img src="<?php the_sub_field('pictograma'); ?>" alt="shakira impacto"></figure>
	    				<div class="text-body">
	    					<?php the_sub_field('texto_informativo'); ?>
	    				</div>
	    			</div>
	    		<?php
	    			endwhile;
	    		?>
	    	</div>
	    </div>
	  </div><!-- /.row -->
	</div><!-- /.container -->

	<div class="container-fluid">
	  <div class="row" id="brainpop-container">
	    <div class="container">
	    	<?php the_field('iframe_brainpop');?>
	    </div>
	  </div><!-- /.row -->
	</div><!-- /.container -->

	<div class="container-fluid">
	  <div class="row" id="partners-container">
	    <div class="container">
	    	<div class="impact-items wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
	    		<?php
	    			//Loop the value items
	    			while( have_rows('items_partners')): the_row();
	    		?>

	    			<div class="item wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
	    				<figure><img src="<?php the_sub_field('logo'); ?>" alt="pies descalzos partners"></figure>
	    			</div>
	    		<?php
	    			endwhile;
	    		?>
	    	</div>
	    </div>
	  </div><!-- /.row -->
	</div><!-- /.container -->

	<?php
	endwhile;

get_template_part('includes/footer'); ?>
