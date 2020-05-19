<section class="form-post--question">
    <div class="form-post--question-wrapper">
        <header>
            <h2>¡Tengo una pregunta!</h2>
            <p>Registra tus datos y haz tus preguntas, pronto te responderemos.</p>
        </header>
        <div class="form-post--results" id="QuestionsPostResult"></div>
        <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" class="post-questions" method="POST" id="QuestionsPost">
            <fieldset>
                <div class="form-item form-item--textfield">
                    <input type="text" name="the-name-user" id="user" placeholder="Nombres" required>
                </div>
                <div class="form-item form-item--textfield">
                    <input type="text" name="the-email" id="email" placeholder="Correo" required>
                </div>
                <div class="form-item form-item--textfield">
                    <input type="text" name="the-name-city" id="city" placeholder="Ciudad" required>
                </div>
                <div class="form-item form-item--textfield">
                    <input type="text" name="the-education" id="education" placeholder="Institución Educativa" required>
                </div>
                <div class="form-item form-item--double">
                    <div class="form-item form-item--select">
                        <select id="materia" name="the-signature">
                            <option>Materia</option>
                            <?php
                            if ($terms = get_terms(array('taxonomy' => 'materia'))) :
                                foreach ($terms as $term) :
                                    echo '<option value="' . $term->name . '">' . $term->name . '</option>';
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </div>
                    <div class="form-item form-item--select">
                        <select id="materia" name="the-grade">
                            <option>Grado</option>
                            <?php
                            if ($terms = get_terms(array('taxonomy' => 'curso'))) :
                                foreach ($terms as $term) :
                                    echo '<option value="' . $term->name . '">' . $term->name . '</option>';
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-item form-item--textarea">
                    <textarea name="the-question" id="question" placeholder="Escribe tu pregunta aquí"></textarea>
                </div>
                <div class="form-item form-item--file">
                    <input type="file" id="avatar" name="the-attached" accept="image/png, image/jpeg" />
                </div>
            </fieldset>
            <fieldset class="full">
                <div class="form-item form-item--captcha"></div>
                <div class="form-item form-item--acceptance">
                    <div class="form-item form-item--checkbox">
                        <span><input type="checkbox" name="the-acceptance" id="acceptance" required></span>
                        <label for="the-acceptance">He leído y acepto los <a href="https://fundacionpiesdescalzos.com/pies-descalzos/politica-de-tratamiento-de-datos/" target="_blank">Términos y Condiciones</a></label>
                    </div>
                </div>
                <div class="form-item form-item--acceptance">
                    <input type="hidden" name="action" value="questions_post">
                    <button type="submit">Publicar</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>