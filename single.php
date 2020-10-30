<?php
/** Single Template File
 * @package Aquila
 */

    get_header();
?>
    <div id="primary">

        <div class="container file-name">
            <span>
                <?php esc_html_e( basename( __FILE__ ) ); ?>
            </span>
        </div>

        <main id="main" class="site-main mt-5" role="main">
            <?php 
                if ( have_posts() ) : 
                    ?>
                        <div class="container">

                            <?php
                                if( is_home() && ! is_front_page() ) {
                                    ?>
                                        <header class="mb-5">
                                            <h1 class="page-title screen-reader-text">
                                                <?php single_post_title(); ?>
                                            </h1>
                                        </header>
                                    <?php
                                }
                            ?>

                            <?php
                                // Loop WP
                                while ( have_posts() ) : the_post(); 
                                    get_template_part( 'template-parts/content' );
                                endwhile; 
                            ?>

                        </div>

                        <div class="container">
                            <?php 
                                /** Pagination */
                                aquila_single_page_pagination();
                            ?>
                        </div>

                    <?php
                else :
                    get_template_part( 'template-parts/content-none' );
                endif; 
                
                //  Solo Debugging
                //  get_template_part( 'template-parts/content-none' ); 
            ?> 

        </main>

    </div>
<?php 
    get_footer();