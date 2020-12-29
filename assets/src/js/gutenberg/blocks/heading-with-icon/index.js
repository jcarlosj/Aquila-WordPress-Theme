import { registerBlockType } from '@wordpress/blocks';
import { RichText } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

/** Component */
import Edit from './Edit';
import { getIconComponent } from './icons-map';

/** Registra el tipo de bloque */
registerBlockType( 'aquila-blocks/heading-with-icon', {
    apiVersion: 2,
    title: __( 'Heading with icon', 'aquila' ),
    icon: 'admin-customizer',
    category: 'aquila',
    description: __( 'Add heading and select icon', 'aquila' ),
    attributes: {
        option: {
            type: 'string',
            default: 'dos'
        },
        content: {
            type: 'string',
            source: 'html',
            selector: 'h4',
            default: __( 'Dos', 'aquila' )
        },
    },
    edit: Edit,
    save({ attributes: { content, option } }) {
        const HeadingIcon = getIconComponent( option );

        console.warn( 'save', content );

        return ( 
            <div className="aquila-icon-heading">
                <span className="aquila-icon-heading__heading">
                    <HeadingIcon />
                </span>
            
                <RichText.Content 
                    tagName="h4"
                    value={ content }
                />
            </div>
        );
    },
} );