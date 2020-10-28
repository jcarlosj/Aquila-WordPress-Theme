<?php
/** Template Part: Post entry header
 * @package Aquila
 */

$the_post_id = get_the_ID();                                            //  Obtiene el ID del Post
$hide_title = get_post_meta( $the_post_id, '_hide_page_title', true );  //  Obtiene el metadato usando: ID del Post, ID único (Metadata key) y si debe devolver un solo dato o no
$has_post_thumbnail = get_the_post_thumbnail( $the_post_id );           //  Obtiene la miniatura de la publicación.

 echo '<pre>';   print_r( 'Post ID ' .$the_post_id. ' -> ' .$hide_title );  wp_die();    
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