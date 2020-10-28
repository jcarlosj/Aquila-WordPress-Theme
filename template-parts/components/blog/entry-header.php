<?php
/** Template Part: Post entry header
 * @package Aquila
 */

$the_post_id = get_the_ID();                                    //  Obtiene el ID del Post
$has_post_thumbnail = get_the_post_thumbnail( $the_post_id );   //  Obtiene la miniatura de la publicación.
?>

<header id="entry-header">
    <?php
        //  Feature image
        if( $has_post_thumbnail ) {
            ?>
                <div class="entry-image mb-3">
                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                        <?php 
                            the_post_custom_thumbnail(
                                $the_post_id,       //  ID del post
                                'featured-large',   //  Tamano de la imagen
                                [
                                    'sizes' => '(max-width: 590px) 590px, 425px',
                                    'class' => 'attachment-featured-large size-featured-image'
                                ]
                            ); 
                        ?>
                    </a>
                </div>
            <?php
        }
    ?>
</header>