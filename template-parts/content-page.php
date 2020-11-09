<?php
/** Template Part: Display Content Page
 * @package Aquila
 */
?>
                 
<article 
    id="post-<?php the_ID(); ?>"
    <?php post_class( 'mb-5' ); ?>
>
    <?php
        if( ! is_home() ) {
            ?>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header>
            <?php
        }
    ?>

    <div class="entry-content">
        <?php
            the_content();

            if( ! is_home() ) {
                //  Paginación de una sola publicación (Single Post Pagination)
                wp_link_pages([
                    'before' => '<div class="page-links">' .esc_html__( 'Pages:', 'aquila' ),
                    'after'  => '</div>'
                ]);
            }
        ?>
    </div>

    <footer class="entry-footer">
        <?php 
            edit_post_link( 
                esc_html__( 'Edit', 'aquila' ),
                '<span class="edit-link">',
                '</span>' 
            ); 
        ?>
    </footer>

</article>