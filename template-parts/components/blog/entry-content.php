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
        }
        else {
            aquila_the_excerpt( 140 );
        }
    ?>
</div>
