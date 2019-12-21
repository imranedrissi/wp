<?php 
function my_scripts() {
  wp_enqueue_style('dosis-font', 'https://fonts.googleapis.com/css?family=Dosis:400,700&display=swap');

  wp_enqueue_style('my-styles', get_template_directory_uri() . '/assets/css/main.css', 1.0);

  wp_enqueue_script('my-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'my_scripts');

register_nav_menus( array(
  'nav_main' => __('Menu principal'),
  'nav_side' => __('Menu vertical'),
  'nav_footer' => __('Pied de page'),
) );

add_theme_support( 'post-thumbnails' );

?>