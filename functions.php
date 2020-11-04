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


if( ! defined( 'AQUILA_BUILD_URI' ) ) {
    define( 
        'AQUILA_BUILD_URI', 
        untrailingslashit( get_template_directory_uri(). '/assets/build' )     // WP Func: Elimina las barras inclinadas hacia adelante y hacia atrás si existen.
    );
}

if( ! defined( 'AQUILA_BUILD_JS_URI' ) ) {
    define( 
        'AQUILA_BUILD_JS_URI', 
        untrailingslashit( get_template_directory_uri(). '/assets/build/js' )     // WP Func: Elimina las barras inclinadas hacia adelante y hacia atrás si existen.
    );
}

if( ! defined( 'AQUILA_BUILD_JS_DIR_PATH' ) ) {
    define( 
        'AQUILA_BUILD_JS_DIR_PATH', 
        untrailingslashit( get_template_directory(). '/assets/build/js' )     // WP Func: Elimina las barras inclinadas hacia adelante y hacia atrás si existen.
    );
}

if( ! defined( 'AQUILA_BUILD_CSS_URI' ) ) {
    define( 
        'AQUILA_BUILD_CSS_URI', 
        untrailingslashit( get_template_directory_uri(). '/assets/build/css' )     // WP Func: Elimina las barras inclinadas hacia adelante y hacia atrás si existen.
    );
}

if( ! defined( 'AQUILA_BUILD_CSS_DIR_PATH' ) ) {
    define( 
        'AQUILA_BUILD_CSS_DIR_PATH', 
        untrailingslashit( get_template_directory(). '/assets/build/css' )     // WP Func: Elimina las barras inclinadas hacia adelante y hacia atrás si existen.
    );
}

if( ! defined( 'AQUILA_BUILD_IMAGES_URI' ) ) {
    define( 
        'AQUILA_BUILD_IMAGES_URI', 
        untrailingslashit( get_template_directory_uri(). '/assets/build/images' )     // WP Func: Elimina las barras inclinadas hacia adelante y hacia atrás si existen.
    );
}

/** Debugging Code */
// echo '<pre>';   print_r( AQUILA_DIR_PATH ); wp_die();

require_once AQUILA_DIR_PATH. '/inc/helpers/autoloader.php';    //  Incluirá automáticamente todas las clases que definamos 
require_once AQUILA_DIR_PATH. '/inc/helpers/template-tags.php'; //  Incluirá fragmentos de código que pueden ser utilizados en toda la aplicación

function aquila_get_theme_instance() {
	\AQUILA_THEME\Inc\Aquila_Theme::get_instance();
}

aquila_get_theme_instance();
