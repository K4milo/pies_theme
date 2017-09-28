<?php 

/*
  Template Name: Home
*/

get_template_part('includes/header'); 

	while(have_posts()):the_post();
?>

	<div class="container-fluid">
	  <div class="row" id="video-container">
	    <div class="container">
			<div class="copy-video">
				<img src="<?php the_field('copy_video');?>" alt="<?php the_title(); ?>">
			</div>
		</div>
	  </div><!-- /.row -->
	</div><!-- /.container -->

	<div class="container-fluid">
	  <div class="row" id="infographics-container">
	    <div class="container">
	    	<div class="col-md-6 text">
	    		<h2>
	    			<img src="<?php the_field('titulo_infografia');?>" alt="<?php the_title(); ?>">
	    		</h2>
	    		<div class="text-body">
	    			<?php the_field('texto_infografia');?>
	    		</div>	
	    	</div>
	    	<div class="col-md-6 image">
	    		<img src="<?php the_field('imagen_infografia');?>" alt="<?php the_title(); ?>">
	    	</div>
	    </div>
	  </div><!-- /.row -->
	</div><!-- /.container -->

	<div class="container-fluid">
	  <div class="row" id="items-value-container">
	    <div class="container">
	    	<div class="head-body">
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
	    			<div class="col-md-3 item">
	    				<div class="front" style="background-image:url(<?php echo $init; ?>);"></div>
	    				<div class="back" style="background-image:url(<?php echo $hover; ?>);"></div>
	    				<figure><img src="<?php the_sub_field('pictograma'); ?>" alt="shakira"></figure>
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

	    			<div class="col-md-3 item">
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
	    	<div class="impact-items">
	    		<?php
	    			//Loop the value items
	    			while( have_rows('items_partners')): the_row();
	    		?>

	    			<div class="item">
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
