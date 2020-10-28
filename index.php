<?php
/** Index Template File 
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

                            <div class="row">
                                <?php
                                    $index = 0;
                                    $columns = 3;
                                    // Loop WP
                                    while ( have_posts() ) : the_post(); 
                                        
                                        // Genera etiquetas de grilla 
                                        if( 0 === $index % $columns ) {
                                            ?>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                            <?php
                                        }

                                        // Display post content
                                        the_title( '<h3>', '</h3>' );
                                        the_excerpt( '<div>', '</div>' );

                                        $index ++;

                                        if( 0 !== $index && 0 === $index % $columns ) {
                                            ?>
                                                </div>
                                            <?php
                                        }

                                    endwhile; 
                                ?>
                            </div>

                        </div>
                    <?php
                endif; 
            ?> 
        </main>
    </div>
    
<?php 
    get_footer();