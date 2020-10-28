<?php
/** Register Meta Boxes Theme Assets
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Meta_Boxes {
    use Singleton;

    protected function __construct() {
        // wp_die( 'Class Assets' );

        //  Cargamos Clases.
        $this -> setup_hooks();
    }

    protected function setup_hooks() {
        /** Actions */
        add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] );
        add_action( 'save_post', [ $this, 'save_post_meta_data' ] );
    }

    public function add_custom_meta_box( $post ) {
        $screens = [ 'post' ];                          //  Post Types a los que afectará

        foreach ( $screens as $screen ) {
            add_meta_box(
                '_hide_page_title',                     //  ID único (Metadata key)
                __( 'Title', 'aquila' ),                //  Titulo de la caja
                [ $this, 'custom_meta_box_html' ],      //  Content callback: Debe ser de tipo invocable
                $screen,                                //  Post type/s
                'side'                                  //  Context: posición donde se mostrará Meta Box (Default: 'advanced')
            );
        }
    }

    public function custom_meta_box_html( $post ) {
        $value = get_post_meta( $post -> ID, '_hide_page_title', true );    // Obtiene un metacampo de publicación para el ID de publicación dado.

        ?>
            <label for="aquila-hide-title-field">
                <?php esc_html_e( 'Do you want to hide the title?', 'aquila' ); ?>
            </label>
            <select name="aquila_hide_title_field" id="aquila-hide-title-field" class="postbox">
                <option value="">
                    <?php esc_html_e( 'Select...', 'aquila' ); ?>
                </option>
                <option value="yes" <?php selected( $value, 'yes' ); ?>>
                    <?php esc_html_e( 'Yes', 'aquila' ); ?>
                </option>
                <option value="no" <?php selected( $value, 'no' ); ?>>
                    <?php esc_html_e( 'No', 'aquila' ); ?>
                </option>
            </select>
        <?php
    }

    public function save_post_meta_data( $post_id ) {
        if ( array_key_exists( 'aquila_hide_title_field', $_POST ) ) {
            update_post_meta(
                $post_id,                               //  ID del Post
                '_hide_page_title',                     //  ID único asignado (Metadata key)
                $_POST[ 'aquila_hide_title_field' ]     //  Valor de metadatos. Debe ser serializable si no es escalar
            );
        }
    }

}