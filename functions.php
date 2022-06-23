<?php

// chargement de l'autoloading de composer
require get_template_directory().'/vendor/autoload.php';

//chargement du plugin de menu
require get_template_directory() . '/vendor/wp-bootstrap/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php';
// désactive l'édition de fichier dans l'admin
define( 'DISALLOW_FILE_EDIT', true );

// choix du fuseau horaire
date_default_timezone_set( 'Europe/Paris' );
// choix du réglage régional
setlocale( LC_ALL, 'fr', 'fr_FR', 'fr_FR.utf8', 'fr_FR.ISO_8859-1' );

function wpct_enqueue_styles(){

//boostrap
    wp_enqueue_style('boostrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css');

//font awesome
    wp_enqueue_style('font-awesome-style','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');

//google font
    wp_enqueue_style('google-font-style','https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

//wp custom theme
    wp_enqueue_style('wpct-style',
    get_stylesheet_directory_uri().'/style.css',['boostrap-style','font-awesome-style','google-font-style','tailwind-element-style']);
}
add_action('wp_enqueue_script','wpct_enqueue_styles',PHP_INT_MAX);

function wpct_enqueue_scripts(){
    //jquery
    wp_enqueue_script('jquery-script', 'https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js');
    
    //boostrap
    wp_enqueue_script('boostrap-bundle-script', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js', ['jquery-script']);
}
add_action('wp_enqueue_script','wpct_enqueue_scripts');

// activation de la fonctionnalité des balises HTML5
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
// activation de la fonctionnalité du titre du site
add_theme_support( 'title-tag' );
// activation de la fonctionnalité des vignettes
add_theme_support( 'post-thumbnails' );

// déclaration des menus utilisés
register_nav_menus([
    // si vous changez le nom du menu, changez-le aussi dans la configuration du menu WP_Bootstrap_Navwalker dans le fichier `header.php`
    'main-menu' => 'Main menu',
]);