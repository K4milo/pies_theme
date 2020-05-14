<?php

/***
 *  Ajax logic for questions post input
 * 
 */

add_action('wp_ajax_questions_post', 'question_post_function');
add_action('wp_ajax_nopriv_questions_post', 'questions_post_function');

function question_post_function() {

    if($_POST) :

        // Variable array of posts
        $wpost_nuser = $_POST['the-name-user'];
        $wpost_email = $_POST['the-email'];
        $wpost_city = $_POST['the-name-city'];
        $wpost_education = $_POST['the-education'];
        $wpost_signature = $_POST['the-signature'];
        $wpost_grade = $_POST['the-grade'];
        $wpost_question = $_POST['the-question'];
        $wpost_attached = $_FILES['the-attached']['tmp_name'];

        // Create post object
        $my_question = array (
            'post_title'   => esc_html($wpost_question),
            'post_status'  => 'draft',
            'post_author'  => 3,
            'post_type'    => 'preguntas',
            'tax_input'    => array(
                'curso' => $wpost_grade,
                'materia' => $wpost_signature
            ),
        );

        // Insert the post into the database
        $the_post_id = wp_insert_post($my_question);

        // Update ACF fields
        update_field('student_name', $wpost_nuser, $the_post_id);
        update_field('student_type', $wpost_grade, $the_post_id);
        update_field('student_city', $wpost_city, $the_post_id);
        update_field('student_institution', $wpost_education, $the_post_id);
        update_field('student_mail', $wpost_email, $the_post_id);

        // Insert image
        if($wpost_attached) : 

            $filename = $wpost_attached;

            print_r($_FILES);
            print_r($filename);
 
            // The ID of the post this attachment is for.
            $parent_post_id = $the_post_id;
            
            // Check the type of file. We'll use this as the 'post_mime_type'.
            $filetype = wp_check_filetype( basename( $filename ), null );
            
            // Get the path to the upload directory.
            $wp_upload_dir = wp_upload_dir();
            
            // Prepare an array of post data for the attachment.
            $attachment = array(
                'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
                'post_mime_type' => $filetype['type'],
                'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                'post_content'   => '',
                'post_status'    => 'inherit'
            );
            
            // Insert the attachment.
            $attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
            
            // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
            require_once( ABSPATH . 'wp-admin/includes/image.php' );
            
            // Generate the metadata for the attachment, and update the database record.
            $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
            wp_update_attachment_metadata( $attach_id, $attach_data );
            
            set_post_thumbnail( $parent_post_id, $attach_id );

        endif;
    
    endif;

    die();
    
}
