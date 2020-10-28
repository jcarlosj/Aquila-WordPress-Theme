<?php
/** Helper: Code fragments that we are going to reuse
 * @package Aquila
 */

/** Obtiene miniatura personalizada de la publicación */
function get_the_post_custom_thumbnail( $post_id, $size = 'featured-large', $additional_attributes = [] ) {
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
function the_post_custom_thumbnail( $post_id, $size = 'featured-large', $additional_attributes = [] ) {
    echo get_the_post_custom_thumbnail( $post_id, $size, $additional_attributes );
}