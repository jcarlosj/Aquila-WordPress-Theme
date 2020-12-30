const createBlockColumn = ( valueOption, valueClassName, heading ) => {

    return [ 'core/column', { className: valueClassName }, [
        [ 'aquila-blocks/heading-with-icon', {
                className: 'aquila-dos-and-donts__heading',
                option: valueOption,
                content: heading
            },
            []
        ],
        [ 'core/list', { className: 'aquila-dos-and-donts__list' } ]
    ] ];

}

const blockColumns = [
    [ 'core/columns', { className: 'aquila-dos-donts__cols' }, [
        createBlockColumn( 'dos', 'aquila-dos-and-donts__col-one', "Dos" ),
        createBlockColumn( 'donts', 'aquila-dos-and-donts__col-two', "Dont's" )
    ] ]
];

export const INNER_BLOCKS = [
    [ 'core/group', { className: 'aquila-dos-and-donts__group' }, blockColumns ]
];
