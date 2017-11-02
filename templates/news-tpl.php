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
