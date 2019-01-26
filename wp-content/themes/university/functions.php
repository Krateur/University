<?php
declare(strict_types=1);


function university () {
    wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('stylesheet', get_stylesheet_uri());
    wp_enqueue_script('script', get_theme_file_uri('js/scripts-bundled.js'), NULL, '1.0', true);
}

function features () {
    add_theme_support('title-tag');
}

add_action('wp_enqueue_scripts', 'university');
add_action('after_setup_theme', 'features');