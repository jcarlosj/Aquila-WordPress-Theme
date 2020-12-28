import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

/** Registra el tipo de bloque */
registerBlockType( 'aquila-blocks/heading-with-icon', {
    apiVersion: 2,
    title: __( 'Heading with icon', 'aquila' ),
    icon: 'admin-customizer',
    category: 'aquila',
    description: __( 'Add heading and select icon', 'aquila' ),
    edit() {
        return <div>This is the header block with icon (from the editor).</div>;
    },
    save() {
        return <div>This is the header block with icon (from the frontend).</div>;
    },
} );