<?php
/** Enqueue Theme Assets
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct() {
        // wp_die( 'Class Assets' );

        //  Cargamos Clases.
        $this -> setup_hooks();
    }

    protected function setup_hooks() {
        /** Actions */
        add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
    }

    public function register_styles() {
        wp_enqueue_style( 'style', get_stylesheet_uri(), [], filemtime( AQUILA_DIR_STYLE .'/style.css' ), 'all' );                            //  style.css

        /** Register Styles */
        wp_register_style( 'bootstrap', AQUILA_DIR_URI. '/assets/src/library/css/bootstrap.min.css', [], '4.5.3', 'all' );                //  bootstrap.min.css
        wp_register_style( 'archive', AQUILA_DIR_URI. '/assets/src/css/archive.css', [], filemtime( AQUILA_DIR_STYLE .'/assets/src/css/archive.css' ), 'all' );     //  archive.css
        
        /** Enqueue Styles */
        wp_enqueue_style( 'bootstrap' );

        if( is_archive() ) {                    //  Condicionamos el despliegue del estilo
            wp_enqueue_style( 'archive' );      //  Desplegamos el Estilo
        }
    }

    public function register_scripts() {
        wp_enqueue_script( 'main-js', AQUILA_DIR_URI . '/assets/src/js/main.js', array(), filemtime( AQUILA_DIR_STYLE .'/assets/src/js/main.js' ), true );
        /** Register Scripts */
        wp_register_script( 'bootstrap-js', AQUILA_DIR_URI. '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], '4.5.3', true );    //  bootstrap.min.js
        
        /** Enqueue Scripts */
        wp_enqueue_script( 'bootstrap-js' );
    }

}