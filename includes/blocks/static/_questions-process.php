<?php
/**
 * 
 * Question process block
 */

$q_processs = get_field('questions-process');

    if($q_processs):
?>
    <section class="question-process">
        <header>
            <h2>¿Cómo funciona?</h2>
        </header>
        <ul>
            <?php
            while(have_rows('questions-process')):the_row();
                $q_image = get_sub_field('questions-process--img');
            ?>
                <li><img src="<?php echo $q_image; ?>" alt="Proceso pregunta"/></li>
            <?php
            endwhile;
            ?>
        </ul>
    </section>

<?php endif;