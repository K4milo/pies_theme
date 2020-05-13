<?php

/***
 *  Ajax logic for questions post input
 * 
 */

add_action('wp_ajax_questions_post', 'question_post_function');
add_action('wp_ajax_nopriv_questions_post', 'questions_post_function');

function question_post_function() {

    if($_POST) :
        // Create post object
        $my_post = array(
            'post_title'   => esc_html($video_title),
            'post_content' => '$video_description',
            'post_status'  => 'draft',
            'post_author'  => 1,
            'post_type'    => 'videos',
            'tax_input'    => array(
                "video_category" => '$taxnomy_ids'
            ),
        );

        // Insert the post into the database
        wp_insert_post( $my_post );
    
    endif;

    die();
    
}
