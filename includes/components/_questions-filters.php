<?php

/**
/* Filter component of questions
 */

?>
<section class="question-list--filters">
    <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" class="filter-questions" method="POST" id="QuestionsFilter">
        <?php

        // Tipo pregunta
        if ($terms = get_terms(array('taxonomy' => 'tipo-pregunta', 'orderby' => 'name'))) :
            echo '<fieldset class="filter-group">';
            echo '<header><h3>Tipo pregunta</h3></header>';
            foreach ($terms as $term) :
                echo '<div class="field-item field-item--checkbox field-item--' . $term->slug . '">';
                echo '<span><input type="checkbox" name="' . $term->slug . '" id="' . $term->term_id . '" value="' . $term->term_id . '"></span>';
                echo '<label for="' . $term->slug . '"> ' . $term->name . '</label>';
                echo '</div>';
            endforeach;
            echo '</fieldset>';
        endif;

        // Materias
        if ($terms = get_terms(array('taxonomy' => 'materia', 'orderby' => 'name'))) :
            echo '<fieldset class="filter-group">';
            echo '<header><h3>Materias</h3></header>';
            foreach ($terms as $term) :
                echo '<div class="field-item field-item--checkbox field-item--' . $term->slug . '">';
                echo '<span><input type="checkbox" name="' . $term->slug . '" id="' . $term->term_id . '" value="' . $term->term_id . '"></span>';
                echo '<label for="' . $term->slug . '"> ' . $term->name . '</label>';
                echo '</div>';
            endforeach;
            echo '</fieldset>';
        endif;

        // Materias
        if ($terms = get_terms(array('taxonomy' => 'curso', 'orderby' => 'name'))) :
            echo '<fieldset class="filter-group">';
            echo '<header><h3>Grado</h3></header>';
            foreach ($terms as $term) :
                echo '<div class="field-item field-item--checkbox field-item--' . $term->slug . '">';
                echo '<span><input type="checkbox" name="' . $term->slug . '" id="' . $term->term_id . '" value="' . $term->term_id . '"></span>';
                echo '<label for="' . $term->slug . '"> ' . $term->name . '</label>';
                echo '</div>';
            endforeach;
            echo '</fieldset>';
        endif;
        ?>
        <button>Aplicar Filtro</button>
        <input type="hidden" name="action" value="questions_filter">
    </form>
</section>
