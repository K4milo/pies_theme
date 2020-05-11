<?php

/***
 *  Ajax logic for questions response
 * 
 */

add_action('wp_ajax_questions_filter', 'question_filter_function');
add_action('wp_ajax_nopriv_questions_filter', 'questions_filter_function');

function question_filter_function()
{
    $args = array(
        'post_type' => 'preguntas',
        'posts_per_page' => '-1',
    );

    // Courses loop
    $cursos = get_terms(array('taxonomy' => 'curso'));
    foreach ($cursos as $curso) :
        if (isset($_POST[$curso->slug])) :
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'curso',
                    'field' => 'id',
                    'terms' => $_POST[$curso->slug]
                )
            );
        endif;
    endforeach;

    // Signatures loop
    $materias = get_terms(array('taxonomy' => 'materia'));
    foreach ($materias as $materia) :
        if (isset($_POST[$materia->slug])) :
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'materia',
                    'field' => 'id',
                    'terms' => $_POST[$materia->slug]
                )
            );
        endif;
    endforeach;

    // Questions Types loop
    $tipos = get_terms(array('taxonomy' => 'tipo-pregunta'));
    foreach ($tipos as $tipo) :
        if (isset($_POST[$tipo->slug])) :
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'tipo-pregunta',
                    'field' => 'id',
                    'terms' => $_POST[$tipo->slug]
                )
            );
        endif;
    endforeach;

    // Post type query
    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            echo '<article class="filter-questions--item">';
            echo '<h2>' . $query->post->post_title . '</h2>';
            echo '</article>';
        endwhile;
        wp_reset_postdata();
    else :
        echo '<h3>No existen preguntas con tu criterio de filtro</h3>';
    endif;

    die();
}
