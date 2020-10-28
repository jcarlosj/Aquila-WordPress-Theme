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
                                'featured-thumbnail',   //  Tamano de la imagen registrada en WordPress
                                [
                                    'sizes' => '(max-width: 330px) 330px, 185px',
                                    'class' => 'attachment-featured-thumbnail size-featured-image'
                                ]
                            ); 
                        ?>
                    </a>
                </div>
            <?php
        }
    ?>
</header>