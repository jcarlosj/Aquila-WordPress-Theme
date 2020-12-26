<?php
/** Gutenberg: Block Two Columns Patterns Template
 * @package Aquila
 */
?>

<!-- wp:columns -->
<div class="wp-block-columns">

    <!-- wp:column {"width":66.66} -->
    <div class="wp-block-column" style="flex-basis:66.66%">
        
        <!-- wp:image {"id":154,"sizeSlug":"large","src":"<?php echo esc_url( AQUILA_BUILD_IMAGES_URI. '/medellin.jpg' )?>"} -->
        <figure class="wp-block-image size-large">
            <img src="<?php echo esc_url( AQUILA_BUILD_IMAGES_URI. '/medellin.jpg' )?>" alt="" class="wp-image-154"/>
            <figcaption>Medellin, Colombia</figcaption>
        </figure>
        <!-- /wp:image -->

    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":33.33} -->
    <div class="wp-block-column" style="flex-basis:33.33%">
        
        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">Ven conoce los más hermosos lugares de Colombia.</p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"align":"center"} -->
        <div class="wp-block-buttons aligncenter">
        
            <!-- wp:button -->
            <div class="wp-block-button">
                <a class="wp-block-button__link">Viaja ahora!</a>
            </div>
            <!-- /wp:button -->
            
        </div>
        <!-- /wp:buttons -->

    </div>
    <!-- /wp:column -->

</div>
<!-- /wp:columns -->