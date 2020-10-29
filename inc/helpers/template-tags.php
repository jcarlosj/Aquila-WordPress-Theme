<?php
/** Helper: Code fragments that we are going to reuse
 * @package Aquila
 */

/** Obtiene miniatura personalizada de la publicación */
function get_the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $additional_attributes = [] ) {
    $custom_thumbnail = '';

    /** Verifica que el ID del post no sea nulo y en caso de serlo lo asigna */
    if( null === $post_id ) {
        $post_id = get_the_ID();
    }

    /** Verifica si el post tiene imagen destacada */
    if( has_post_thumbnail( $post_id ) ) {
        /** Establecemos atributos para el Lazy loading (carga perezosa) */
        $default_attributes = [
            'loading' => 'lazy'
        ];

        $attributes = array_merge( $additional_attributes, $default_attributes );

        /** Obtiene elemento img que representa un archivo adjunto de imagen */
        $custom_thumbnail = wp_get_attachment_image(  
            get_post_thumbnail_id( $post_id ),      //  ID de imagen adjunta
            $size,                                  //  Tamaño de imagen.
            false,                                  //  Si la imagen debe tratarse como un icono.
            $attributes                             //  Atributos para el marcado de la imagen.
        );
    }

    return $custom_thumbnail;
}

/** Miniatura personalizada de la publicacion */
function the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $additional_attributes = [] ) {
    echo get_the_post_custom_thumbnail( $post_id, $size, $additional_attributes );
}

function aquila_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    /** La publicación se modifica (cuando el tiempo de publicación de la publicación no es igual al tiempo de modificación de la publicación) */
    if( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';   //  La segunda etiqueta time es para el bot de indexación de Google sepa que el contenido ha sido actualizado
    }

    $time_string = sprintf(     //  (PHP 4, PHP 5, PHP 7) sprintf - Devuelve una cadena formateada
        $time_string,
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_attr( get_the_date() ),
        esc_attr( get_the_modified_date( DATE_W3C ) ),
        esc_attr( get_the_modified_date() )
    );

    $posted_on = sprintf(
        esc_html_x( 'Posted on %s', 'post date', 'aquila' ),    //  Convierte  cadena con el contexto gettext y la escapa para un uso seguro en la salida HTML
        '<a href="' .esc_url( get_the_permalink() ). '" rel="bookmark">' .$time_string. '</a>'
    );

    echo '<span class="posted-one text-secondary">' .$posted_on. '</span>';
}