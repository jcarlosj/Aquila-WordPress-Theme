const getClass = ( postClassName ) => {
    let preClassName = 'aquila-dos-and-donts';

    return `${ preClassName }__${ postClassName }`;
}

const createBlockColumn = ( valueOption, valueClassName, heading ) => {

    return [ 'core/column', { className: getClass( valueClassName ) }, [
        [ 'aquila-blocks/heading-with-icon', {
                className: getClass( 'heading' ),
                option: valueOption,
                content: heading
            },
            []
        ],
        [ 'core/list', { className: getClass( 'list' ) } ]
    ] ];

}

const blockColumns = [
    [ 'core/columns', { className: getClass( 'cols' ) }, [
        createBlockColumn( 'dos', 'col-one', "Dos" ),
        createBlockColumn( 'donts', 'col-two', "Dont's" )
    ] ]
];

export const INNER_BLOCKS = [
    [ 'core/group', { 
            className: getClass( 'group' ),
            backgroundColor: 'luminous-vivid-amber'     //  Color de fondo por defecto para el bloque de grupo
        },
        blockColumns 
    ]
];
