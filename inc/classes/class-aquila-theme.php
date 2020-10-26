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
        /** Hooks: Filters/Actions */
    }

}