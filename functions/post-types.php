<?php

// Custom post types creation
function create_posttype() {

	 ////////////////////
	// POST TYPES
	///////////////////

	//Post Type Proyectos

	register_post_type( 'proyectos',
	// CPT Options
	    array(
	        'labels' => array(
	            'name' => __( 'proyectos' ),
	            'singular_name' => __( 'proyecto' )
	        ),
	        'rewrite' => array('slug' => 'proyecto'),
	        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields'),
	        'public' => true,
	        'hierarchical'        => false,
	        'show_ui'             => true,
	        'show_in_menu'        => true,
	        'show_in_nav_menus'   => true,
	        'show_in_admin_bar'   => true,
	        'menu_position'       => 5,
	        'can_export'          => true,
	        'has_archive'         => true,
	        'exclude_from_search' => false,
	        'publicly_queryable'  => true,
	        'capability_type'     => 'post'
	    )
	);



	////////////////////
	// TAXONOMIAS
	///////////////////



}

// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
