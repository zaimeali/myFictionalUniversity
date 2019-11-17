<?php 

require get_theme_file_path('/inc/search-route.php');
require get_theme_file_path('/inc/like-route.php');

function university_custom_rest(){
    register_rest_field('post', 'authorName', array(
        'get_callback' => function () {
            return get_the_author();
        }
    ));
}

add_action('rest_api_init', 'university_custom_rest');

// Page Banner
function pageBanner($args = NULL){

    // Check for title
    if(!$args['title']){
        $args['title'] = get_the_title();
    }

    // Check for subtitle
    if(!$args['subtitle']){
        $args['subtitle'] = get_field('page_banner_subtitle');
    }

    // Check for photo
    if(!$args['photo']){
        // if there is a photo
        if(get_field('page_banner_background_image')){
            $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
        }
        // for default
        else{
            $args['photo'] = get_theme_file_uri('/img/ocean.jpg');
        }
    }
    ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(
            <?php 
                echo $args['photo'];
                // $pageBanner = get_field('page_banner_background_image'); 
                // echo $pageBanner['url'];
                // echo $pageBanner['sizes']['pageBanner'];
            ?>);">
        </div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
            <div class="page-banner__intro">
                <p>
                    <?php 
                        // the_field('page_banner_subtitle'); 
                        echo $args['subtitle'];
                    ?>
                </p>
            </div>
        </div>  
    </div>
    <?php
}

function university_files(){

    // CSS files
    wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('university_main_files', get_stylesheet_uri());

    // JS files
    // wp_enqueue_scripts('main_university_js', get_theme_file_uri('js/scripts.js'), NULL, '1.0', false);
    // wp_enqueue_scripts('another-university_js', get_theme_file_uri('js/scripts-bundled.js'), NULL, microtime(), true);

    
}

add_action('wp_enqueue_scripts', 'university_files');

// <title>, <nav>, <footer>
function university_features(){
    // register_nav_menu('headerMenuLocation', 'Header Menu Location');
    // register_nav_menu('footerMenuLocation1', 'Footer Menu Location 1');
    // register_nav_menu('footerMenuLocation2', 'Footer Menu Location 2');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape', 400, 260, false);
    add_image_size('professorPortrait', 480, 650, true);
    add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'university_features');


function university_adjust_queries($query){

    if(!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()){
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }

    if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => date('Ymd'), // date('Ymd') => today
            'type' => 'numeric'
        ));
    }
}

add_action('pre_get_post', 'university_adjust_queries');


// Redirect Subscriber accounts out of admin and onto homepage

function redirectSubsToFrontEnd(){
    $ourCurrentUser = wp_get_current_user();

    if(count($ourCurrentUser->roles) AND $ourCurrentUser->roles[0] == 'subscriber'){
        wp_redirect(site_url("/"));
        exit;
    }
}

add_action('admin_init', 'redirectSubsToFrontEnd');



function noSubsAdminBar(){
    $ourCurrentUser = wp_get_current_user();

    if(count($ourCurrentUser->roles) AND $ourCurrentUser->roles[0] == 'subscriber'){
        show_admin_bar(false);
    }
}

add_action('wp_loaded', 'noSubsAdminBar');


// Customize Login Screen
add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl(){
    return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS(){
    wp_enqueue_style('university_main_files', get_stylesheet_uri());
    wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
}

add_filter('login_headertitle', 'ourLoginTitle');

function ourLoginTitle(){
    return get_bloginfo('name');
}

?>