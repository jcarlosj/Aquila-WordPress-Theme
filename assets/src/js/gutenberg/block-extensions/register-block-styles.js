/** Register Block Styles */

import { registerBlockStyle } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

const
    layoutStyleBotton = [
        {
            name: 'layout-border-blue-fill',
            label: __( 'Blue outline', 'aquila' )
        },
        {
            name: 'layout-border-white-no-fill',
            label: __( 'White outline - to be used with dark background', 'aquila' )
        }
    ],
    layoutStyleQuote = [
        {
            name: 'layout-dark-background',
            label: __( 'Layout style dark background', 'aquila' ),
        },
    ];

const register = () => {
    layoutStyleBotton.forEach( layoutStyle => {
        registerBlockStyle( 'core/button', layoutStyle );
    });

    layoutStyleQuote.forEach( ( layoutStyle ) => 
        registerBlockStyle( 'core/quote', layoutStyle )
	);
    
}

/** Invocamos la funcion cuando el DOM ya se ha cargado */
wp.domReady( () => {
    register();
});