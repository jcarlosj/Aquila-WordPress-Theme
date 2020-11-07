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
        // add_action( 'wp_enqueue_scripts', [ $this, 'remove_block_styles' ], 100 );
    
    }

    public function register_styles() {
        wp_enqueue_style( 'style', get_stylesheet_uri(), [], filemtime( AQUILA_DIR_STYLE .'/style.css' ), 'all' );                            //  style.css
        wp_enqueue_style( 'fonts', AQUILA_BUILD_FONTS_URI. '/fonts.css', [], false, 'all' );                                         //  fonts.css

        /** Register Styles */
        wp_register_style( 'bootstrap', AQUILA_DIR_URI. '/assets/src/library/css/bootstrap.min.css', [], '4.5.3', 'all' );                //  bootstrap.min.css
        wp_register_style( 'main', AQUILA_BUILD_CSS_URI . '/main.css', array( 'bootstrap' ), filemtime( AQUILA_BUILD_CSS_DIR_PATH .'/main.css' ), 'all' );    //  main.css
        wp_register_style( 'archive', AQUILA_BUILD_CSS_URI . '/archive.css', array(), filemtime( AQUILA_BUILD_CSS_DIR_PATH .'/archive.css' ), 'all' );    //  archive.css
        
        /** Enqueue Styles */
        wp_enqueue_style( 'bootstrap' );
        wp_enqueue_style( 'main' );

        if( is_archive() ) {                    //  Condicionamos el despliegue del estilo
            wp_enqueue_style( 'archive' );      //  Desplegamos el Estilo
        }
    }

    public function register_scripts() {
        /** Register Scripts */
        wp_register_script( 'bootstrap-js', AQUILA_DIR_URI. '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], '4.5.3', true );    //  bootstrap.min.js
        wp_register_script( 'single', AQUILA_BUILD_JS_URI . '/single.js', array( 'jquery' ), filemtime( AQUILA_BUILD_JS_DIR_PATH .'/single.js' ), true );   //  single.js
        wp_register_script( 'archive', AQUILA_BUILD_JS_URI . '/archive.js', array(), filemtime( AQUILA_BUILD_JS_DIR_PATH .'/archive.js' ), true );       //  archive.js

        /** Enqueue Scripts */
        wp_enqueue_script( 'bootstrap-js' );

        wp_enqueue_script( 'main', AQUILA_BUILD_JS_URI . '/main.js', array( 'jquery' ), filemtime( AQUILA_BUILD_JS_DIR_PATH .'/main.js' ), true );

        /** Condicionamos el acceso al Script */
        if( is_single() ) {                         
            wp_enqueue_script( 'single' );          //  Hace disponible el script
        }
        if( is_archive() ) {                        
            wp_enqueue_script( 'archive' );         //  Hace disponible el script
        }

    }

    //  Elimina CSS de la biblioteca de bloques de Gutenberg para que no se cargue en el FrontEnd
    public function remove_block_styles() {
        wp_dequeue_style( 'wc-block-editor' );      //  Elimina Bloques de WooCommerce
        wp_dequeue_style( 'wp-block-style' );       //  Elimina Bloques de WooCommerce
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
    }

}