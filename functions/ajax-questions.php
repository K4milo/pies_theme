<?php

/***
 *  Ajax logic for questions response
 * 
 */

add_action( 'wp_ajax_nopriv_questions_filter', 'questions_filter' );
add_action( 'wp_ajax_questions_filter', 'questions_filter' );

function questions_filter()
{
    $args = array(
        'post_type' => 'preguntas',
        'posts_per_page' => '-1',
        'post_status' => 'publish'
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
            $post_id = get_the_ID();
            $courses = get_the_terms($post_id, 'curso');
            $signatures = get_the_terms($post_id, 'materia');
            $comments = $query->post->comment_count;
?>
            <article class="filter-questions--item">
                <header>
                    <a href="<?php the_permalink(); ?>">
                        <span></span>
                        <h3><?php the_title(); ?></h3>
                    </a>
                </header>
                <div class="filter-questions--item-text">
                    <ul>
                        <?php
                        foreach ($courses as $course) :
                            echo '<li> ' . $course->name . '</li>';
                        endforeach;

                        foreach ($signatures as $signature) :
                            echo '<li> ' . $signature->name . '</li>';
                        endforeach;
                        ?>
                    </ul>
                    <?php if($comments >= 1): ?>
                        <a href="<?php the_permalink(); ?>">Ver respuesta</a>
                    <?php else: ?>
                        <span class="filter-questions--item__empty">Por responder</span>
                    <?php endif; ?>
                </div>
            </article>
<?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<h3>No existen preguntas con tu criterio de filtro</h3>';
    endif;
    wp_die();
}
