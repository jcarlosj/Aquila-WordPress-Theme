<?php
/** Footer Template
 * @package Aquila
 */
?>
        <footer>
            <div class="container">
                <h3>Footer</h3>
                <?php  
                    if( is_active_sidebar( 'sidebar-2' ) ) {
                        ?>
                            <aside>
                                <?php dynamic_sidebar( 'sidebar-2' ); ?>
                            </aside>
                        <?php
                    }
                ?>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>