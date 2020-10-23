<?php
/** Theme Functions
 * @package Aquila
 */

 /**
 * Proper way to enqueue scripts and styles.
 */
function aquila_enqueue_scripts() {
    /** Debugging Code */
    // echo '<pre>';
    // print_r([ 
    //     get_stylesheet_uri(), 
    //     filemtime( get_stylesheet_directory() .'/style.css' ) 
    // ]);
    // wp_die();

    # wp_enqueue_style( 'main', get_template_directory_uri(). '/main.css', [ 'style-css' ] );                   //  main.css (Ej: Carga hoja de estilos con dependencia)
    wp_enqueue_style( 'style', get_stylesheet_uri(), [], filemtime( get_stylesheet_directory() .'/style.css' ), 'all' );    //  style.csS
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), filemtime( get_stylesheet_directory() .'/assets/js/main.js' ), true );

    /** Registramos */
    wp_register_style( 'archive', get_template_directory_uri(). '/assets/css/archive.css', [], filemtime( get_stylesheet_directory() .'/assets/css/archive.css' ), 'all' );

    wp_register_style( 'bootstrap', get_template_directory_uri(). '/assets/library/css/bootstrap.min.css', [], '4.5.3', 'all' );               //  bootstrap.min.css
    wp_register_script( 'bootstrap-js', get_template_directory_uri(). '/assets/library/js/bootstrap.min.js', [ 'jquery' ], '4.5.3', true );    //  bootstrap.min.js

    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_script( 'bootstrap-js' );

    if( is_archive() ) {                    //  Condicionamos el despliegue del estilo
        wp_enqueue_style( 'archive' );      //  Desplegamos el Estilo
    }
    
}
add_action( 'wp_enqueue_scripts', 'aquila_enqueue_scripts' );