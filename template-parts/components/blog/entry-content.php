<?php
/** Template Part: Post entry content
 * @package Aquila
 */
?>

<div class="entry-content">
    <?php
        if( is_single() ) {

            the_content(
                //  Contenido para cuando hay más texto.
                sprintf(
                    wp_kses(
                        __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'aquila' ),
                        [
                            'span' => [
                                'class' => []
                            ]
                        ]
                    ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                )
            );

            //  Paginación de una sola publicación (Single Post Pagination)
            wp_link_pages([
                'before' => '<div class="page-links">' .esc_html__( 'Pages:', 'aquila' ),
                'after'  => '</div>'
            ]);

        }
        else {
            aquila_the_excerpt( 140 );
            echo aquila_excerpt_more();
        }

    ?>
</div>
