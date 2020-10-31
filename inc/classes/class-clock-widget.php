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
            'clock_widget',                                             // Base ID (la base de datos lo guardará en la tabla ..._options usando el prefijo widget, en este caso así: widget_clock_widget )
            'Clock',                                                    // Name
            array( 'description' => __( 'Clock Widget', 'aquila' ), )   // Args
        );
    }

    /** 
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        // echo '<pre>';    print_r( $args );
        extract( $args );
        $title = apply_filters( 'widget_title', $instance[ 'title' ] );
 
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        echo __( 'Hello, World!', 'aquila' );
        echo $after_widget;
    }

        /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Clock', 'aquila' );
        }
        
        ?>
            <p>
                <label 
                    for="<?php echo $this -> get_field_name( 'title' ); ?>"
                >
                    <?php _e( 'Title:' ); ?>
                </label>
                <input 
                    class="widefat" 
                    id="<?php echo $this -> get_field_id( 'title' ); ?>" 
                    name="<?php echo $this -> get_field_name( 'title' ); ?>" 
                    type="text" 
                    value="<?php echo esc_attr( $title ); ?>" 
                />
            </p>
        <?php
    }

}