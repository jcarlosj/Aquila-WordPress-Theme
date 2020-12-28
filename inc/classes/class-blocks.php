<?php
/** Blocks
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Blocks {
    use Singleton;

    protected function __construct() {
        // wp_die( 'Class Blocks' );

        //  Cargamos Clases.
        $this -> setup_hooks();
    }

    protected function setup_hooks() {
        /** Actions */
        add_action( 'block_categories', [ $this , 'add_block_categories' ] );
    }

    public function add_block_categories( $categories ) {

        $new_category = [
            'slug'  => 'aquila',
            'title' => __( 'Aquila Blocks', 'aquila' ),
            'icon'  => 'table-row-after'
        ];

        $category_slugs = wp_list_pluck( $categories, 'slug' );      //  Extraiga un determinado campo de cada objeto de una lista. En este caso el slug de cada categoria de bloque existente

        // echo '<pre>';   print_r( $category_slugs );   echo '</pre>';    wp_die();

        //  Comprueba si un valor existe en un array.   Si el tercer parámetro strict está establecido a TRUE, la función in_array() también comprobará los tipos de needle en haystack. 
        $allCategories = in_array( 'aquila', $category_slugs, true )       
                ?   $categories
                :   array_merge(
                        $categories,
                        [ $new_category ]
                    );

        // echo '<pre>';   print_r( $allCategories );   echo '</pre>';    wp_die();

        return $allCategories;
    }

}