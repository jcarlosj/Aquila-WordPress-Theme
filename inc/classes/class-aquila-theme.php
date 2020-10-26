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
    }

}