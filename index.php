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
                                while ( have_posts() ) : the_post(); 
                                    // Display post content
                                    the_title();
                                    the_excerpt();
                                endwhile; 
                            ?>
                        </div>
                    <?php
                endif; 
            ?> 
        </main>
    </div>
    
<?php 
    get_footer();