<?php
// Chargement du style
function theme_enqueue_styles() 
{
    wp_enqueue_style('theme', get_template_directory_uri() . '/css/theme.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    // Chargement de Font Awesome pour les icônes
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), null);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// Ajout de la gestion des menus dans le tableau de bord de wordpress 
function register_custom_menus() {
    register_nav_menus(array(
        'menu_principal' => __('Menu principal', 'Mota'), 
        'menu_secondaire' => __('Menu secondaire', 'Mota'),
    ));
}
add_action('init', 'register_custom_menus');

// Chargement du script JS
function theme_enqueue_script() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js'); 
}
add_action('wp_enqueue_scripts', 'theme_enqueue_script');