<?php
/** Front-Page Template File 
 * @package Aquila
 */

    get_header();
?>
        <div class="content">
            <?php esc_html_e( basename( __FILE__ ) ); ?>
        </div>
<?php 
    get_footer();