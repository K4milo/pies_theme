<?php

function bst_enqueues() {

	/* Styles */

	wp_register_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', false, '3.3.4', null);
	wp_enqueue_style('bootstrap-css');

  	wp_register_style('bst-css', get_template_directory_uri() . '/css/bst.css', false, null);
	wp_enqueue_style('bst-css');

	wp_register_style('slick-css', get_template_directory_uri() . '/css/slick.css', false, null);
	wp_enqueue_style('slick-css');

	wp_register_style('slick-theme-css', get_template_directory_uri() . '/css/slick-theme.css', false, null);
	wp_enqueue_style('slick-theme-css');

	wp_register_style('animate-css', get_template_directory_uri() . '/css/animate.css', false, null);
	wp_enqueue_style('animate-css');

	wp_register_style('styles-css', get_template_directory_uri() . '/css/styles.css', false, null);
	wp_enqueue_style('styles-css');

	/* Scripts */

	wp_enqueue_script( 'jquery' );
	/* Note: this above uses WordPress's onboard jQuery. You can enqueue other pre-registered scripts from WordPress too. See:
	https://developer.wordpress.org/reference/functions/wp_enqueue_script/#Default_Scripts_Included_and_Registered_by_WordPress */

  	wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.8.3.min.js', false, null, true);
	wp_enqueue_script('modernizr');

  	wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', false, null, true);
	wp_enqueue_script('bootstrap-js');

	wp_register_script('slick-js', get_template_directory_uri() . '/js/slick.min.js', false, null, true);
	wp_enqueue_script('slick-js');

	wp_register_script('knob-js', get_template_directory_uri() . '/js/jquery.knob.min.js', false, null, true);
	wp_enqueue_script('knob-js');

	wp_register_script('wow-js', get_template_directory_uri() . '/js/wow.js', false, null, true);
	wp_enqueue_script('wow-js');

	wp_register_script('waypoints-js', get_template_directory_uri() . '/js/waypoints.js', false, null, true);
	wp_enqueue_script('waypoints-js');

	wp_register_script('counterup-js', get_template_directory_uri() . '/js/counterup.js', false, null, true);
	wp_enqueue_script('counterup-js');

	wp_register_script('bst-js', get_template_directory_uri() . '/js/bst.js', false, null, true);
	wp_enqueue_script('bst-js');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'bst_enqueues', 100);
