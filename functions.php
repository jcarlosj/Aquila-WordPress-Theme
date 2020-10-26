<?php
/** Theme Functions
 * @package Aquila
 */

if( ! defined( 'AQUILA_DIR_PATH' ) ) {
    define( 
        'AQUILA_DIR_PATH', 
        untrailingslashit( get_template_directory() )     // WP Func: Elimina las barras inclinadas hacia adelante y hacia atrás si existen.
    );
}

if( ! defined( 'AQUILA_DIR_URI' ) ) {
    define( 
        'AQUILA_DIR_URI', 
        untrailingslashit( get_template_directory_uri() )     // WP Func: Elimina las barras inclinadas hacia adelante y hacia atrás si existen.
    );
}

if( ! defined( 'AQUILA_DIR_STYLE' ) ) {
    define( 
        'AQUILA_DIR_STYLE', 
        untrailingslashit( get_stylesheet_directory() )     // WP Func: Elimina las barras inclinadas hacia adelante y hacia atrás si existen.
    );
}

/** Debugging Code */
// echo '<pre>';   print_r( AQUILA_DIR_PATH ); wp_die();

require_once AQUILA_DIR_PATH. '/inc/helpers/autoloader.php';    //  Incluirá automáticamente todas las clases que definamos 

function aquila_get_theme_instance() {
	\AQUILA_THEME\Inc\Aquila_Theme::get_instance();
}

aquila_get_theme_instance();
