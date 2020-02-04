<?php

function bst_enqueues() {

	/* Styles */

	wp_register_style('bootstrap-css', get_template_directory_uri() . '/assets/css/vendors/bootstrap.min.css', false, '3.3.4', null);
	wp_enqueue_style('bootstrap-css');

  	wp_register_style('bst-css', get_template_directory_uri() . '/assets/css/vendors/bst.css', false, null);
	wp_enqueue_style('bst-css');

	wp_register_style('slick-css', get_template_directory_uri() . '/assets/css/vendors/slick.css', false, null);
	wp_enqueue_style('slick-css');

	wp_register_style('slick-theme-css', get_template_directory_uri() . '/assets/css/vendors/slick-theme.css', false, null);
	wp_enqueue_style('slick-theme-css');

	wp_register_style('animate-css', get_template_directory_uri() . '/assets/css/vendors/animate.css', false, null);
	wp_enqueue_style('animate-css');

	wp_register_style('styles-css', get_template_directory_uri() . '/assets/css/theme.css', false, null);
	wp_enqueue_style('styles-css');

	// wp_register_style('cristian-css', get_template_directory_uri() . '/assets/css/cristian.css', false, null);
	// wp_enqueue_style('cristian-css');

	/* Scripts */

	wp_enqueue_script( 'jquery' );
	/* Note: this above uses WordPress's onboard jQuery. You can enqueue other pre-registered scripts from WordPress too. See:
	https://developer.wordpress.org/reference/functions/wp_enqueue_script/#Default_Scripts_Included_and_Registered_by_WordPress */

  	wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendors/modernizr-2.8.3.min.js', false, null, true);
	wp_enqueue_script('modernizr');

  	wp_register_script('bootstrap-js', get_template_directory_uri() . '/assets/js/vendors/bootstrap.min.js', false, null, true);
	wp_enqueue_script('bootstrap-js');

	wp_register_script('slick-js', get_template_directory_uri() . '/assets/js/vendors/slick.min.js', false, null, true);
	wp_enqueue_script('slick-js');

	wp_register_script('knob-js', get_template_directory_uri() . '/assets/js/vendors/jquery.knob.min.js', false, null, true);
	wp_enqueue_script('knob-js');

	wp_register_script('wow-js', get_template_directory_uri() . '/assets/js/vendors/wow.js', false, null, true);
	wp_enqueue_script('wow-js');

	wp_register_script('waypoints-js', get_template_directory_uri() . '/assets/js/vendors/waypoints.js', false, null, true);
	wp_enqueue_script('waypoints-js');

	wp_register_script('counterup-js', get_template_directory_uri() . '/assets/js/vendors/counterup.js', false, null, true);
	wp_enqueue_script('counterup-js');

	wp_register_script('bst-js', get_template_directory_uri() . '/assets/js/main.js', false, null, true);
	wp_enqueue_script('bst-js');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'bst_enqueues', 100);
