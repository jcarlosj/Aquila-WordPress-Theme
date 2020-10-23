<?php
/** Header Template
 * @package Aquila
 */
?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php wp_head(); ?>
    </head>
    <body class="<?php body_class(); ?>">
        <?php /** Verifica si la funcion existe para agregarla (wp_body_open aparece en la version 5.2 de WordPress) */ 
            if( function_exists( 'wp_body_open' ) ) {
                wp_body_open();
            } 
        ?>
        <header>Cabecera</header>