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
        add_action( 'enqueue_block_assets', [ $this, 'enqueue_editor_assets' ] );
    
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

    public function enqueue_editor_assets() {
        /** Incluye hojas de estilo para el editor en el BackEnd (WP Admin) y a todas las interfaces el FrontEnd & BackEnd */
        $asset_config_file = sprintf( '%s/assets.php', AQUILA_BUILD_PATH );     //  Obtengo el archivo de configuración de assets generado, para el desarrollo.

        /** Valida si el archivo generado existe */
        if( ! file_exists( $asset_config_file ) ) {
            return;
        }

        $asset_config = require_once $asset_config_file;

        /** Valida si NO tenemos la dependencia disponible */
        if( empty( $asset_config[ 'js/editor.js' ] ) ) {
            return;
        }

        $editor_asset = $asset_config[ 'js/editor.js' ];
        $js_dependencies = ( ! empty( $editor_asset[ 'dependencies' ] ) )   ? $editor_asset[ 'dependencies' ]   : [] ;                          //  Extraigo las dependencias del array en el archivo
        $version = ( ! empty( $editor_asset[ 'version' ] ) )   ? $editor_asset[ 'version' ]   : filemtime( $asset_config_file ) ;       //  Extraigo # de version autogenerada (para el cacheo en el navegador)

        /** Ponemos en cola las dependencias Java Script para Bloque de Gutenberg en el Tema */
        if( is_admin() ) {      //  Verificamos que el Editor esta de lado del BackEnd

            /** Incluye archivo JavaScript con las dependencias requeridas */
            wp_enqueue_script(
                'aquila-blocks',                    //  Handle
                AQUILA_BUILD_JS_URI. '/blocks.js',  //  Ruta del archivo generado
                $js_dependencies,                   //  Dependencias generadas
                $version,                           //  Versión auto generada
                true
            );

        }

        /** CSS del bloque de Gutenberg */
        $css_dependencies = [       //   Serán la biblioteca de bloques de WordPress, por que no obtenemos dependencias CSS a través del complemento Extractor 'dependency-extraction-webpack-plugin'
            'wp-block-library',                  
            'wp-block-library-theme'
        ];

        wp_enqueue_style(
            'aquila-blocks',                            //  Handle
            AQUILA_BUILD_CSS_URI. '/blocks.css',        //  Ruta del archivo generado
            $css_dependencies,                          //  Dependencias generadas
            filemtime( AQUILA_BUILD_CSS_DIR_PATH. '/blocks.css' ),                           //  Versión auto generada
            'all'
        );

    }

}