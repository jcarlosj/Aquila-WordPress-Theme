<?php
/** Template Part: Post entry footer
 * Usado dentro del Loop WP
 * @package Aquila
 */

$post_id = get_the_ID();                            //  Obtiene el ID de una publicacion (Debe estar dentro del Loop WP)
$article_terms = wp_get_post_terms(                 //  Recupera los términos de una publicación.
    $post_id,                       //  ID de la Publicacion
    [ 'category', 'post_tag' ]      //  Taxonomias
);     

// echo '<pre>';   print_r( $article_terms );  

if( empty( $article_terms ) || ! is_array( $article_terms ) ) {
    return;
}
?>

<div class="entry-footer mt-4">
    <?php
        foreach ( $article_terms as $key => $article_term ) {
            //  get_term_link: Genera un enlace permanente para un archivo de términos de taxonomía.
            ?>
                <a 
                    class="btn border border-secondary mb-2 mr-2 entry-footer-link text-black-50" 
                    href="<?php echo esc_url( get_term_link( $article_term ) ); ?>"
                >
                    <?php echo esc_html( $article_term -> name ); ?>
                </a>
            <?php
        }
    ?>
</div>