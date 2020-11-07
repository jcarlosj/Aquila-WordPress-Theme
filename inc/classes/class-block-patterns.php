<?php
/** Gutenberg: Block Patterns
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Block_Patterns {
    use Singleton;

    protected function __construct() {
        // wp_die( 'Class Assets' );

        //  Cargamos Clases.
        $this -> setup_hooks();
    }

    protected function setup_hooks() {
        /** Actions */
        
        add_action( 'init', [ $this, 'register_block_patterns' ] );
        add_action( 'init', [ $this, 'register_block_pattern_categories' ] );
    }

    public function register_block_patterns() {

        ob_start();         //  Activa el almacenamiento en búfer de la salida

        get_template_part( 'template-parts/patterns/block-two-columns' );
        $block_content = ob_get_contents();     //  Devuelve contenido del búfer de salida
        
        ob_end_clean();     //  Limpiar (eliminar) el búfer de salida
        
        register_block_pattern(
            'aquila/block-image-text-button',
            array(
                'title'       => __( 'Aquila Block: Image/Text/Button', 'aquila' ),
                'description' => _x( 'Block image text and button.', 'Block pattern description', 'aquila' ),
                'categories'  => [ 'block' ],
                'content'     => $block_content
            )
        );

        ob_start();         //  Activa el almacenamiento en búfer de la salida

        get_template_part( 'template-parts/patterns/cover' );
        $cover_content = ob_get_contents();     //  Devuelve contenido del búfer de salida
        
        ob_end_clean();     //  Limpiar (eliminar) el búfer de salida

        register_block_pattern(
            'aquila/cover',
            [
                'title'       => __( 'Aquila Cover: Image/Text/Button', 'aquila' ),
                'description' => _x( 'Cover image text and button.', 'Block pattern description', 'aquila' ),
                'categories'  => [ 'cover' ],
                'content'     => $cover_content
            ]
        );
        
    }

    public function register_block_pattern_categories() {

        $pattern_categories = [
            'block' => __( 'Block', 'aquila' ),
            'carousel' => __( 'Carousel', 'aquila' ), 
            'cover' => __( 'Cover', 'aquila' ),
        ];

        if( ! empty( $pattern_categories ) && is_array( $pattern_categories ) ) {
            foreach( $pattern_categories as $pattern_category => $pattern_category_label ) {

                register_block_pattern_category(
                    $pattern_category,
                    array( 'label' => $pattern_category_label )
                );

            }
        }


        register_block_pattern_category(
            'hero',
            array( 'label' => __( 'Hero', 'my-plugin' ) )
        );

    }

}