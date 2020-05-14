<div id="QuestionsResponse" class="filter-questions question-list--questions">
    <?php

    $args = array(
        'post_type' => 'preguntas',
        'posts_per_page' => '-1',
        'post_status' => 'publish'
    );

    // Post type query
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();

            $post_id = get_the_ID();
            $courses = get_the_terms($post_id, 'curso');
            $signatures = get_the_terms($post_id, 'materia');
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
                    <a href="<?php the_permalink(); ?>">Ver respuesta</a>
                </div>
            </article>
    <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<h2>No existen preguntas</h2>';
    endif;
    ?>
</div>