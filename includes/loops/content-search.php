<?php
/*
The Search Loop
===============
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
    
	<article class="new-item col-md-3" style="background-image:url(<?php the_post_thumbnail_url('full')?>)">
		<a href="<?php the_permalink();?>">
			<h3><?php echo the_title();?></h3>
		</a>
		<div class="excerpt">
			<?php the_excerpt();?>
		</div>
	</article>

<?php endwhile; else: ?>
    <div class="alert alert-warning">
        <?php if(ICL_LANGUAGE_CODE=='es'): ?>
        	<i class="glyphicon glyphicon-exclamation-sign"></i> <?php _e('No existen resultados con ese criterio de búsqueda.', 'bst'); ?>
    	<?php else:?>
    		<i class="glyphicon glyphicon-exclamation-sign"></i> <?php _e('There are no results with these search criteria', 'bst'); ?>
    	<?php endif;?>	
    </div>
<?php endif; ?>
