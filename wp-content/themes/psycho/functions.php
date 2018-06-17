<?php
require  'post-types/offer.php';

add_theme_support('menus');
add_theme_support('post-thumbnails');



function register_my_menus() {
    register_nav_menus(
        array(
            'header' => "Menu w headerze",
            'sidebar' => "Menu w sidebarze",
            'footer' => "Menu w footerze",
        )
    );
}
add_action( 'init', 'register_my_menus' );



function psycho_styles() {
    wp_enqueue_script('popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], null, true);

    wp_enqueue_script(
        'bootstrap',
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js',
        ['jquery', 'popper'],
        '1.0.0',
        true );

    wp_enqueue_style(
        'bootstrap',
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css',
        null,
        true );

    wp_enqueue_style(
        'style-css',
        get_stylesheet_directory_uri() . '/css/main.css',
        ['bootstrap', 'reset-css'],
        true );

    wp_enqueue_style(
        'reset-css',
        get_stylesheet_directory_uri() . '/css/reset.css',
        true );


    wp_enqueue_script('js', get_stylesheet_directory_uri() . '/js/main.js', ['jquery'], null, true);

}
add_action( 'wp_enqueue_scripts' , 'psycho_styles' );


