export const INNER_BLOCKS_TEMPLATE = [ 
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