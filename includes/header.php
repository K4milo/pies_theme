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
// Background fields
  $bg_mobile = get_field('bg_mobile');
  $bg_desktop = get_field('bg_desktop');
  $is_mobile = wp_is_mobile();
  $style_source = $is_mobile ? $bg_mobile : $bg_desktop;
  $has_image = ($bg_mobile || $bg_desktop) 
    ? 'style="background-image: url('. $style_source .'); background-size: cover;"'
    : '';
?>

<body <?php body_class(); echo $has_image;?>>

<!--[if lt IE 8]>
<div class="alert alert-warning">
	You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
</div>
<![endif]-->
<!--nav class="side-menu">
  <div class="nav-header">
    <button type="button" class="navbar-side-btn">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="nav-collapse" id="navbar-side">
    <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
      <img src="<?php bloginfo('template_url')?>/img/logos/logo.png" alt="Fundación Pies Descalzos"/>
    </a>
    <?php
        wp_nav_menu( array(
            'theme_location'    => 'navbar-left',
            'depth'             => 2,
            'menu_class'        => 'nav navbar-nav'));
      ?>

      <div class="lang-select">
        <?php do_action('icl_language_selector'); ?>
      </div>

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
  </div>
</nav-->

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

<!--
Site Title
==========
If you are displaying your site title in the "brand" link in the Bootstrap navbar,
then you probably don't require a site title. Alternatively you can use the example below.
See also the accompanying CSS example in css/bst.css .

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1 id="site-title">
      	<a class="text-muted" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
      </h1>
    </div>
  </div>
</div>
-->
