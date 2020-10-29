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
        // echo '<pre>';   print_r( plugin_basename( __FILE__ ) );  wp_die();       //  plugin_basename(): obtiene la ruta a un archivo o directorio de complementos, en relación con el directorio de complementos, sin las barras al principio y al final

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

        /** Crea nonce para la verificacion del formulario */
        wp_nonce_field( 
            plugin_basename( __FILE__ ),    //  Nombre de la Acción
            'hide_title_meta_box_name'      //  Nombre del Nonce
        );   

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

        /** Verifica si el usuario actual NO está autorizado. */
        if( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        /** Valida si el valor de nonce que recibimos es diferente al que creamos 
         *      wp_verify_nonce( $nombre-nonce, $nombre-accion )     
         *      Un nonce es válido por 24 horas (por defecto).
        */
        if( ! isset( $_POST[ 'hide_title_meta_box_name' ] ) 
            || ! wp_verify_nonce( $_POST[ 'hide_title_meta_box_name' ], plugin_basename( __FILE__) ) 
        ) {
            return;
        }  

        /** Cuando la publicación se guarda o se actualiza, obtenemos $_POST disponible.  */
        if ( array_key_exists( 'aquila_hide_title_field', $_POST ) ) { 
            update_post_meta(
                $post_id,                               //  ID del Post
                '_hide_page_title',                     //  ID único asignado (Metadata key)
                $_POST[ 'aquila_hide_title_field' ]     //  Valor de metadatos. Debe ser serializable si no es escalar
            );
        }
    }

}