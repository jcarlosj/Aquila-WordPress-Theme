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

function aquila_posted_by() {
    
    $byline = sprintf(
        esc_html_x( ' by %s', 'post author', 'aquila' ),
        '<span class="author vcard"><a href="' .esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ). '">' .esc_html( get_the_author() ). '</a><span/>'
    );

    echo '<span class="byline text-secondary">' .$byline. '</span>';
}

function aquila_the_excerpt( $trim_character_count = 0 ) {
    /** Verifica si la publicación NO tiene un extracto personalizado. */
    if( ! has_excerpt() || 0 === $trim_character_count ) {
        the_excerpt();      //  Muestre el extracto de la publicación o una version reducida del contenido en caso de no tenerlo.
        return;
    }

    /** Obtiene el extracto */
    $excerpt = wp_strip_all_tags( get_the_excerpt() );              //  Elimine correctamente todas las etiquetas HTML, incluidos el script y el estilo
    $excerpt = substr( $excerpt, 0, $trim_character_count );        //  Obtiene un fragmento del extracto que inicia del caracter 0 al $trim_character_count
    $excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );     //  Encuentra la posición de la última aparición de una subcadena y elimina la última parabra "cortada en la mayoría de los casos"

    echo $excerpt .' ...';
}

function aquila_excerpt_more( $more = '' ) {
    if( ! is_single() ) {
        $more = sprintf(
            '<div class="mt-3"><a href="%1$s"class="btn btn-info aquila-text-more text-white">%2$s</a></div>',
            get_permalink( get_the_ID() ),
            __( 'Read more', 'aquila' )
        );
    }

    return $more;
}

function aquila_single_page_pagination() {
    ?>
        <nav class="aquila-single-pagination">
            <?php
                previous_post_link( '%link', '%title' );    //  Muestra el enlace de la publicación anterior adyacente a la publicación actual.
                next_post_link( '%link', '%title' );        //  Muestra el enlace de la siguiente publicación adyacente a la publicación actual.
                /**
                 * Cambia el formato predeterminado '«%link' a solo el título de la publicación, eliminando las flechas dobles predeterminadas.
                 */
            ?>
        </nav>
    <?php
}

function aquila_post_pagination() {

    $args = [
        'before_page_number' => '<span class="btn border border-secondary mr-2 mb-2">',
        'after_page_number'  => '</span>'
    ];

    $allowed_tags = [
        'span' => [
            'class' => []
        ],
        'a' => [
            'class' => [],
            'href'  => []
        ]
    ];

    printf( 
        '<nav class="aquila-post-pagination clearfix">%s</nav>', 
        wp_kses(
            paginate_links( $args ),    //  Recupere el enlace paginado para las páginas de publicación de archivos.
            $allowed_tags               //  Etiquetas HTML permitidas
        )
    );
}