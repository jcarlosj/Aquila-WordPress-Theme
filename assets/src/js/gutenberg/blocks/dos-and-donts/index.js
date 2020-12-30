import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

/** Component */
import Edit from './Edit';

/** Registra el tipo de bloque */
registerBlockType( 'aquila-blocks/dos-and-donts', {
	title: __( "Dos and Dont's", 'aquila' ),
	icon: 'editor-table',
	category: 'aquila',
	description: __( 'Add heading and text', 'aquila' ),
	edit: Edit,
	save() {
		return (
			<div className="aquila-dos-and-donts">
				<InnerBlocks.Content />
			</div>
		);
	}
} );
