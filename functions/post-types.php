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
	            'name' => __( 'Proyectos' ),
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

	//Post Type Preguntas

	register_post_type( 'preguntas',
	// CPT Options
	    array(
	        'labels' => array(
	            'name' => __( 'Preguntas' ),
	            'singular_name' => __( 'pregunta' )
	        ),
	        'rewrite' => array('slug' => 'pregunta'),
	        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields'),
	        'public' => true,
	        'hierarchical'        => false,
	        'show_ui'             => true,
	        'show_in_menu'        => true,
	        'show_in_nav_menus'   => true,
	        'show_in_admin_bar'   => true,
	        'menu_position'       => 6,
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

	$labels = array(
		'name'              => _x( 'Tipo Preguntas', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Tipo Pregunta', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Buscar Tipo Preguntas', 'textdomain' ),
		'all_items'         => __( 'Todos los Tipo Preguntas', 'textdomain' ),
		'parent_item'       => __( 'Tipo Pregunta Padre', 'textdomain' ),
		'parent_item_colon' => __( 'Tipo Pregunta Padre:', 'textdomain' ),
		'edit_item'         => __( 'Editar Tipo Pregunta', 'textdomain' ),
		'update_item'       => __( 'Actualizar Tipo Pregunta', 'textdomain' ),
		'add_new_item'      => __( 'Nuevo Tipo Pregunta', 'textdomain' ),
		'new_item_name'     => __( 'Nuevo nombre de Tipo Pregunta', 'textdomain' ),
		'menu_name'         => __( 'Tipo Pregunta', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'tipo-pregunta' ),
	);

	$labels_curso = array(
		'name'              => _x( 'Cursos', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Curso', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Buscar Cursos', 'textdomain' ),
		'all_items'         => __( 'Todos los Cursos', 'textdomain' ),
		'parent_item'       => __( 'Curso Padre', 'textdomain' ),
		'parent_item_colon' => __( 'Curso Padre:', 'textdomain' ),
		'edit_item'         => __( 'Editar Curso', 'textdomain' ),
		'update_item'       => __( 'Actualizar Curso', 'textdomain' ),
		'add_new_item'      => __( 'Nuevo Curso', 'textdomain' ),
		'new_item_name'     => __( 'Nuevo nombre de Curso', 'textdomain' ),
		'menu_name'         => __( 'Curso', 'textdomain' ),
	);

	$args_curso = array(
		'hierarchical'      => true,
		'labels'            => $labels_curso,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'curso' ),
	);

	$labels_materia = array(
		'name'              => _x( 'Materias', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Materia', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Buscar Materias', 'textdomain' ),
		'all_items'         => __( 'Todos los Materias', 'textdomain' ),
		'parent_item'       => __( 'Materia Padre', 'textdomain' ),
		'parent_item_colon' => __( 'Materia Padre:', 'textdomain' ),
		'edit_item'         => __( 'Editar Materia', 'textdomain' ),
		'update_item'       => __( 'Actualizar Materia', 'textdomain' ),
		'add_new_item'      => __( 'Nuevo Materia', 'textdomain' ),
		'new_item_name'     => __( 'Nuevo nombre de Materia', 'textdomain' ),
		'menu_name'         => __( 'Materia', 'textdomain' ),
	);

	$args_materia = array(
		'hierarchical'      => true,
		'labels'            => $labels_materia,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'materia' ),
	);

	register_taxonomy( 'tipo-pregunta', array( 'preguntas' ), $args );
	register_taxonomy( 'curso', array( 'preguntas' ), $args_curso );
	register_taxonomy( 'materia', array( 'preguntas' ), $args_materia );
}

// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
