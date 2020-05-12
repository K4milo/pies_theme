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

    if ($_POST) :

        $args['tax_query'] = array('relation' => 'OR');

        // Taxonomy loop
        foreach ($_POST as $name => $term) :
            $taxname = '';

            if ($term && $name != 'action') :

                $taxname = explode("_", $name);

                if ($taxname != '') :
                    $args['tax_query'][] = array(
                        'taxonomy' => strval(
                            $taxname[0]
                        ),
                        'field' => 'id',
                        'terms' => $term
                    );
                endif;
            endif;
        endforeach;
    endif;

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
