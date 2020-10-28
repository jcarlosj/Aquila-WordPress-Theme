<?php
/** Page Template File 
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
        
    </div>
<?php 
    get_footer();