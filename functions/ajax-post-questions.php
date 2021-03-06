<?php

/***
 *  Ajax logic for questions post input
 * 
 */

add_action('wp_ajax_questions_post', 'questions_post');
add_action('wp_ajax_nopriv_questions_post', 'questions_post');


// Insert image 
if (!function_exists('insert_attachment')) :
    function insert_attachment($file_handler, $post_id, $setthumb = 'false')
    {
        if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) {
            return __return_false();
        }
        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
        require_once(ABSPATH . "wp-admin" . '/includes/file.php');
        require_once(ABSPATH . "wp-admin" . '/includes/media.php');

        echo $attach_id = media_handle_upload($file_handler, $post_id);
        //set post thumbnail if setthumb is 1
        if ($setthumb == 1) update_post_meta($post_id, '_thumbnail_id', $attach_id);
        return $attach_id;
    }
endif;

function questions_post() {

    if ($_POST) :
        // Variable array of posts
        $wpost_nuser = $_POST['the-name-user'];
        $wpost_email = $_POST['the-email'];
        $wpost_city = $_POST['the-name-city'];
        $wpost_education = $_POST['the-education'];
        $wpost_signature = $_POST['the-signature'];
        $wpost_grade = $_POST['the-grade'];
        $wpost_question = $_POST['the-title'];
        $wpost_who = $_POST['the-who'];
        $wpost_content = $_POST['the-question'];
        $wpost_file = $_FILES['the-attached'];
        $wpost_attached = $_FILES['the-attached']['tmp_name'];

        // Create post object
        $my_question = array(
            'post_title'   => esc_html($wpost_question),
            'post_content' => esc_html($wpost_content),
            'post_status'  => 'draft',
            'post_author'  => 3,
            'post_type'    => 'preguntas',
        );

        // Insert the post into the database
        $the_post_id = wp_insert_post($my_question);

        // Update ACF fields
        update_field('student_name', $wpost_nuser, $the_post_id);
        update_field('student_type', $wpost_grade, $the_post_id);
        update_field('student_city', $wpost_city, $the_post_id);
        update_field('student_institution', $wpost_education, $the_post_id);
        update_field('student_mail', $wpost_email, $the_post_id);
        update_field('student_role', $wpost_who, $the_post_id);

        // Insert image
        if ($wpost_attached) :
            $file = $wpost_file;
            $post_id = $the_post_id;

            array_reverse($_FILES);
            $i = 0; //this will count the posts
            foreach ($_FILES as $file => $array) {
                if ($i == 0) $set_feature = 1;
                else $set_feature = 0;
                $newupload = insert_attachment($file, $post_id, $set_feature);
                echo $i++;
            }
        endif;

        // Update taxonomy terms
        if($wpost_grade || $wpost_signature):
            wp_set_object_terms($the_post_id, $wpost_grade, 'curso');
            wp_set_object_terms($the_post_id, $wpost_signature, 'materia');
        endif;

    endif;

    die();
}
