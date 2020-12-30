<?php
/** Single Template File
 * @package Aquila
 */

    /** By Testing */
    $post_id = get_the_ID();
    // $post = get_post( $post_id );
    // $parsed_blocks = parse_blocks( $post -> post_content );
    // echo '<pre>';   print_r( $parsed_blocks );   echo '</pre>';     wp_die();

    get_header();
?>
    <div id="primary">

        <div class="container file-name">
            <span>
                <?php esc_html_e( basename( __FILE__ ) ); ?>
                ( post: <?php echo $post_id; ?> )
            </span>

        </div>

        <main id="main" class="site-main mt-5" role="main">

            <div class="container">

                <div class="row">

                    <div class="col-lg-8 col-md-8 col-sm-12">

                        <?php 
                            if ( have_posts() ) : 
                                ?>
                                    <div class="post-wrap">

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

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <?php get_sidebar(); ?>
                    </div>

                </div>

            </div>

        </main>

    </div>
<?php 
    get_footer();