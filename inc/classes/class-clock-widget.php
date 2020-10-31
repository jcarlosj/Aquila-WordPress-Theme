<?php
/** Theme Clock Widget
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;
use WP_Widget;

class Clock_Widget extends WP_Widget {
    use Singleton;

    /** Register widget with WordPress. */
    public function __construct() {
        /** Configuración base del Widget */
        parent :: __construct(
            'clock_widget',                                             // Base ID
            'Clock',                                                    // Name
            array( 'description' => __( 'Clock Widget', 'aquila' ), )   // Args
        );
    }

}