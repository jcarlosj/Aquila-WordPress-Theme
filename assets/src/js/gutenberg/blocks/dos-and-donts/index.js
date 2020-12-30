import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

const INNER_BLOCKS_TEMPLATE = [ 
	[ 'core/columns', { className: 'aquila-dos-and-donts__cols' }, [
		[ 'core/column', { className: 'aquila-dos-and-donts__col-one' }, [
			[
				'aquila-blocks/heading-with-icon',
				{
					className: 'aquila-dos-and-donts__heading',
					option: 'dos',
					content: "Dos"
				},
				[]
			],
			[ 'core/list', { className: 'aquila-dos-and-donts__list' } ]
		] ],
		[ 'core/column', { className: 'aquila-dos-and-donts__col-two' }, [
			[
				'aquila-blocks/heading-with-icon',
				{
					className: 'aquila-dos-and-donts__heading',
					option: 'donts', 
					content: "Dont's"
				},
				[]
			],
			[ 'core/list', { className: 'aquila-dos-and-donts__list' } ]
		] ]
	] ]
];

/** Registra el tipo de bloque */
registerBlockType( 'aquila-blocks/dos-and-donts', {
	title: __( "Dos and Dont's", 'aquila' ),
	icon: 'editor-table',
	category: 'aquila',
	description: __( 'Add heading and text', 'aquila' ),
	edit() {
		return (
			<div className="aquila-dos-and-donts">
				<InnerBlocks 
					template={ INNER_BLOCKS_TEMPLATE }
					allowedBlocks={ [ 'core/group' ] }
					templateLock={ true }
				/>
			</div>
		);
	},
	save() {
		return (
			<div className="aquila-dos-and-donts">
				<InnerBlocks.Content />
			</div>
		);
	}
} );
