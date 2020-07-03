<?php

/**
/* Filter component of questions
 */

?>
<section class="question-list--filters">
    <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" class="filter-questions" method="POST" id="QuestionsFilter">
        <header>
            <h3>Filtrar Por:</h3>
        </header>
        <?php // get_search_form(); ?>
        <?php

        // Tipo pregunta
        if ($terms = get_terms(array('taxonomy' => 'tipo-pregunta','hide_empty' => false,  'parent' => 0))) :
            echo '<fieldset class="filter-group">';
                echo '<header data-toggle="collapse" data-target="#QType"><h3>Tipo pregunta</h3></header>';
                echo '<div id="QType">';
                    foreach ($terms as $term) :
                        echo '<div class="field-item field-item--checkbox field-item--' . $term->slug . '">';
                        echo '<span><input type="checkbox" name="tipo-pregunta_' . $term->slug . '" id="' . $term->term_id . '" value="' . $term->term_id . '"></span>';
                        echo '<label for="tipo-pregunta"> ' . $term->name . '</label>';
                        echo '</div>';
                    endforeach;
                echo '</div>';
            echo '</fieldset>';
        endif;

        // Materias
        if ($terms = get_terms(array('taxonomy' => 'materia','hide_empty' => false,  'parent' => 0))) :
            echo '<fieldset class="filter-group">';
                echo '<header data-toggle="collapse" data-target="#QCourse"><h3>Materias</h3></header>';
                echo '<div id="QCourse">';
                    foreach ($terms as $term) :
                        echo '<div class="field-item field-item--checkbox field-item--' . $term->slug . '">';
                            echo '<span><input type="checkbox" name="materia_' . $term->slug . '" id="' . $term->term_id . '" value="' . $term->term_id . '"></span>';
                            echo '<label for="materia"> ' . $term->name . '</label>';
                        echo '</div>';
                    endforeach;
                echo '</div>';
            echo '</fieldset>';
        endif;

        // Materias
        if ($terms = get_terms(array('taxonomy' => 'curso','hide_empty' => false,  'parent' => 0))) :
            echo '<fieldset class="filter-group">';
                echo '<header data-toggle="collapse" data-target="#QGrade"><h3>Grado</h3></header>';
                echo '<div id="QGrade">';
                foreach ($terms as $term) :
                    echo '<div class="field-item field-item--checkbox field-item--' . $term->slug . '">';
                        echo '<span><input type="checkbox" name="curso_' . $term->slug . '" id="' . $term->term_id . '" value="' . $term->term_id . '"></span>';
                        echo '<label for="curso"> ' . $term->name . '</label>';
                    echo '</div>';
                endforeach;
                echo '</div>';
            echo '</fieldset>';
        endif;
        ?>
        <button>Aplicar Filtro</button>
        <input type="hidden" name="action" value="questions_filter">
    </form>
</section>
