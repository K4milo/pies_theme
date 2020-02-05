<!DOCTYPE html>
<html class="no-js">
<head>
	<title><?php wp_title('•', true, 'right'); bloginfo('name'); ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<?php

/*
	bg image script
*/

if (have_posts()):while (have_posts()):the_post();
	$bgImage;

	if(get_field('imagen_fondo')){
		$bgImage = get_field('imagen_fondo');
	} else {
		$bgImage = 'https://fundacionpiesdescalzos.com/wp-content/themes/pies_theme/img/bgs/bg-blog.jpg';
	}

endwhile; endif; wp_reset_query();?>

<body <?php body_class(); ?>  style="background-image: url('<?php echo $bgImage; ?>')">

<!--[if lt IE 8]>
<div class="alert alert-warning">
	You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
</div>
<![endif]-->

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="row-header">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
          <img src="<?php bloginfo('template_url')?>/img/logos/logo.png" alt="Fundación Pies Descalzos"/>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar">
        <?php
            wp_nav_menu( array(
                'theme_location'    => 'navbar-left',
                'depth'             => 2,
                'menu_class'        => 'nav navbar-nav navbar-nav--left',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
				<?php do_action('icl_language_selector'); ?>
			<?php
					wp_nav_menu( array(
							'theme_location'    => 'navbar-right',
							'depth'             => 2,
							'menu_class'        => 'nav navbar-nav navbar-right',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
					);
			?>
        <div class="follow">
          <ul>
            <li><a href="https://www.facebook.com/fpiesdescalzos/?ref=ts" class="social-icn fb" target="_blank">Facebook</a></li>
            <li><a href="https://twitter.com/fpiesdescalzos" class="social-icn tw" target="_blank">Twitter</a></li>
            <li><a href="https://www.youtube.com/user/fundpiesdescalzos" class="social-icn yt" target="_blank">Youtube</a></li>
            <li><a href="https://www.instagram.com/fpiesdescalzos/" class="social-icn in" target="_blank">Instagram</a></li>
            <li><a href="https://www.linkedin.com/company/10414649/" class="social-icn lin" target="_blank">LinkedIn</a></li>
            <li><a href="https://piesdescalzoslive.wordpress.com" class="social-icn let" target="_blank">LinkedIn</a></li>
          </ul>
        </div>

        <?php if(ICL_LANGUAGE_CODE=='es'): ?>
          <a class="the-fly" href="/donaciones/">
            <img src="<?php bloginfo('template_url')?>/img/misc/Mosca-Donar.png" alt="Fundación Pies Descalzos"/>
          </a>
        <?php elseif(ICL_LANGUAGE_CODE=='en'): ?>
          <a class="the-fly" href="/en/donation/">
            <img src="<?php bloginfo('template_url')?>/img/misc/Mosca-Donate.png" alt="Fundación Pies Descalzos"/>
          </a>
        <?php endif; ?>
      </div><!-- /.navbar-collapse -->
    </div>
  </div><!-- /.container -->
</nav>

<div class="container-fluid">
  <div class="row">
		<div class="col-xs-6 col-sm-3 " id="sidebar" role="navigation">
		<?php get_template_part('includes/sidebar'); ?>
		</div>
    <div class="new-singlecontent col-xs-12 col-sm-9">
      <div id="content" role="main">
		<?php get_template_part('includes/loops/content', 'single');?>
	  </div><!-- /#content -->
    </div>
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_template_part('includes/footer');?>
