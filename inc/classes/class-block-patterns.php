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
        
        register_block_pattern(
            'aquila/block-image-text-button',
            array(
                'title'       => __( 'Aquila Block: Image/Text/Button', 'aquila' ),
                'description' => _x( 'Block image text and button.', 'Block pattern description', 'aquila' ),
                'categories'  => [ 'block' ],
                'content'     => "
                    <!-- wp:columns -->
                    <div class=\"wp-block-columns\">

                        <!-- wp:column {\"width\":66.66} -->
                        <div class=\"wp-block-column\" style=\"flex-basis:66.66%\">
                            <!-- wp:image {\"id\":154,\"sizeSlug\":\"large\"} -->
                            <figure class=\"wp-block-image size-large\"><img src=\"http://localhost:8080/wp-content/uploads/2020/11/Colombia_GettyImages-150953681-1024x576.jpg\" alt=\"\" class=\"wp-image-154\"/><figcaption>Medellin, Colombia</figcaption></figure>
                            <!-- /wp:image --></div>
                        <!-- /wp:column -->
                    
                        <!-- wp:column {\"width\":33.33} -->
                        <div class=\"wp-block-column\" style=\"flex-basis:33.33%\">
                            
                            <!-- wp:paragraph {\"align\":\"center\"} -->
                            <p class=\"has-text-align-center\">Ven conoce los más hermosos lugares de Colombia.</p>
                            <!-- /wp:paragraph -->
                        
                            <!-- wp:buttons {\"align\":\"center\"} -->
                            <div class=\"wp-block-buttons aligncenter\">
                            
                                <!-- wp:button -->
                                <div class=\"wp-block-button\">
                                    <a class=\"wp-block-button__link\">Viaja ahora!</a>
                                </div>
                                <!-- /wp:button -->
                                
                            </div>
                            <!-- /wp:buttons -->

                        </div>
                        <!-- /wp:column -->
                    
                    </div>
                    <!-- /wp:columns -->
                ",
            )
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