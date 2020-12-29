import { RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, RadioControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

/** Icons */
import { getIconComponent } from './icons-map';

const Edit = ( props ) => {

    const 
        { className, attributes: { content, option }, setAttributes } = props,
        HeadingIcon = getIconComponent( option );

    console.warn( 'Edit', props );
    console.warn( 'option', option );
    console.warn( 'Component', HeadingIcon );

    return ( 
        <div className="aquila-icon-heading">
            <span className="aquila-icon-heading__heading">
                <HeadingIcon />
            </span>
            <RichText 
                tagName="h4"                    //  La etiqueta aquí es la salida del elemento y se puede editar en el administrador.
                className={ className }
                value={ content }               //  Cualquier contenido existente, ya sea de la base de datos o de un atributo predeterminado
                onChange={ ( content ) => setAttributes({ content }) }
                placeholder={ __( 'Heading...', 'aquila' ) }
            />
            <InspectorControls>
                <PanelBody 
                    title={ __( 'Block Settings', 'aquila' ) }
                >
                    <RadioControl
                        label={ __( 'Select the icon', 'aquila' ) }
                        help={ __( 'Controls icon selection', 'aquila' ) }
                        selected={ option }
                        options={ [
                            { label: __( 'Dos', 'aquila' ), value: 'dos' },
                            { label: __( 'Dont\'s', 'aquila' ), value: 'donts' },
                        ] }
                        onChange={ ( option ) => { setAttributes( { option } ) } }
                    />
                </PanelBody>
            </InspectorControls>
        </div> 
    );
}

export default Edit;