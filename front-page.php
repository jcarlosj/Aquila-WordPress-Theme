<?php
/** Front-Page Template File 
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

            <div class="home-page-wrap">

            <?php 
                if ( have_posts() ) : 
                    // Loop WP
                    while ( have_posts() ) : the_post(); 
                        get_template_part( 'template-parts/content', 'page' );
                    endwhile; 

                else :
                    get_template_part( 'template-parts/content-none' );
                endif; 
                
                //  Solo Debugging
                //  get_template_part( 'template-parts/content-none' ); 
            ?> 

            </div>

        </main>

    </div>
<?php 
    get_footer();