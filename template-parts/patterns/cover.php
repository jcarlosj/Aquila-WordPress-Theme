<?php
/** Gutenberg: Cover Block Patterns Template
 * @package Aquila
 */
?>

<!-- wp:cover {"url":"http://localhost:8080/wp-content/uploads/2020/11/city-1.jpg","id":160,"focalPoint":{"x":"0.50","y":"1.00"},"align":"full"} -->
<div class="wp-block-cover alignfull has-background-dim" style="background-image:url(http://localhost:8080/wp-content/uploads/2020/11/city-1.jpg);background-position:50% 100%">
    <div class="wp-block-cover__inner-container">
    
    <!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
    <p class="has-text-align-center has-large-font-size"><strong>Rhoncus mattis rhoncus urna.</strong></p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center">Tristique nulla aliquet enim tortor at auctor. At imperdiet dui accumsan sit amet nulla facilisi</p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"align":"center"} -->
    <div class="wp-block-buttons aligncenter">
    
        <!-- wp:button {"textColor":"white","className":"is-style-outline"} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color">Etiam non!</a></div>
        <!-- /wp:button -->
        
    </div>
    <!-- /wp:buttons -->
    
    </div>
</div>
<!-- /wp:cover -->