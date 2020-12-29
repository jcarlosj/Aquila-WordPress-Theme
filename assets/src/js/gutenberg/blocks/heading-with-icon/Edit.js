import { RichText } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

const Edit = ( props ) => {

    const { className, attributes: { content }, setAttributes } = props;

    console.warn( 'Edit', props );

    return ( 
        <div className="aquila-icon-heading">
            <span className="aquila-icon-heading__heading" />
            <RichText 
                tagName="h4"                    //  La etiqueta aquí es la salida del elemento y se puede editar en el administrador.
                className={ className }
                value={ content }               //  Cualquier contenido existente, ya sea de la base de datos o de un atributo predeterminado
                onChange={ ( content ) => setAttributes({ content }) }
                placeholder={ __( 'Heading...', 'aquila' ) }
            />
        </div> 
    );
}

export default Edit;