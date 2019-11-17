<?php

add_action('rest_api_init', 'universityLikeRoutes');

function universityLikeRoutes(){
    register_rest_route('university/v1', 'manageLike', array(
        'methods' => 'POST',
        'callback' => 'createLike'
    ));
    register_rest_route('university/v1', 'manageLike', array(
        'methods' => 'DELETE',
        'callback' => 'deleteLike'
    ));
}

function createLike($data){

    if(is_user_logged_in()){
        $professor = sanitize_text_field($data['professorID']);

        return wp_insert_post(array(
            'post_type' => 'like',
            'post_status' => 'publish',
            'post_title' => '2nd PHP Test',
            'meta_input' => array(
              'liked_professor_id' => $professor
            )
        ));
    }
    else{
        die("Only Logged In User Can Like");
    }
}

function deleteLike(){
    return "Dislike";
}

?>