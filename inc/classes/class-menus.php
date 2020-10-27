<?php
/** Register Menus
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Menus {
    use Singleton;

    protected function __construct() {
        // wp_die( 'Class Menus' );

        //  Cargamos Clases.
        $this -> setup_hooks();
    }

    protected function setup_hooks() {
        /** Actions */
        add_action( 'init', [ $this, 'register_menus'] );
    }

    public function register_menus() {
        register_nav_menus([
            'aquila-header-menu' => esc_html__( 'Header Menu', 'aquila' ),
            'aquila-footer-menu'  => esc_html__( 'Footer Menu', 'aquila' )
        ]);
    }

    public function get_menu_id( $location ) {
        $locations = get_nav_menu_locations();      //  Obtener todas las ubicaciones
        echo '<pre>';   print_r( $locations );  wp_die();
    }

}