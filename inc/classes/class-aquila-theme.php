<?php
/** Boostraps the Theme
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Aquila_Theme {
    use Singleton;

    protected function __construct() {
        // wp_die( 'AQUILA_THEME!' );

        //  Cargamos Clases.
        Assets :: get_instance();
        Menus :: get_instance();
        Meta_Boxes :: get_instance();
        
        $this -> setup_hooks();
    }

    protected function setup_hooks() {
        /** Actions */
        add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
    }

    public function setup_theme() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo', [
            'header-text' => [ 'site-title', 'site-description' ],
            'height'      => 100,
            'wight'       => 400,
            'flex-height' => true,
            'flex-width'  => true  
        ]);
        add_theme_support( 'custom-background',  [
            'default-color'  => 'fff',
            'default-image'  => AQUILA_DIR_URI. '/assets/src/images/ny.webp',
            'default-repeat' => 'no-repeat'
        ]);
        add_theme_support( 'post-thumbnails' );                         //  Habilita la opcion de agregar imagenes personalizadas a las publicaciones
        add_image_size( 'featured-thumbnail', 330, 185, true );             //  Registra un nuevo tamaño de imagen con cropping activo
        add_theme_support( 'customize-selective-refresh-widgets' );     //  Habilita la actualización selectiva para los widgets que se administran dentro del personalizador
        add_theme_support( 'automatic-feed-links' );                    //  Habilita enlaces automáticos de alimentación para publicar y comentar en el encabezado
        add_theme_support( 'html5',                                     //  Permite el uso de marcado HTML5 para los formularios de búsqueda, formularios de comentarios, listas de comentarios, galería y subtítulos
            array( 
                'comment-list', 
                'comment-form', 
                'search-form', 
                'gallery', 
                'caption', 
                'style', 
                'script' 
            )
        );
        add_theme_support( 'wp-block-styles' );                         //  Habilita soporte para estilos de bloques en Gutenberg (https://make.wordpress.org/core/2018/06/05/whats-new-in-gutenberg-5th-june/)
        add_theme_support( 'align-wide' );                              //  Habilita soporte de alineacion (Wide/Full Screen) de bloques en Gutenberg 
        add_editor_style();                                             //  Agrega llamada hoja de estilo personalizadas del editor TinyMCE. Recibe parametro como nombre de archivo relativo a la raíz del tema. También acepta una variedad de hojas de estilo. Es opcional y por defecto es 'editor-style.css'.
    
        /** Establece el ancho máximo para el contenido en la interfaz */
        global $content_width;
        if( ! isset( $content_width ) ) {
            $content_width = 1240;
        }

    }

}