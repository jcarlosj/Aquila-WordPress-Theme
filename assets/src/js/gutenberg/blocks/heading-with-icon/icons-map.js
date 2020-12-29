import { isEmpty } from 'lodash';
import * as SvgIcons from '../../../icons';     //  Import index.js

export const getIconComponent = ( option ) => {
    const IconMap = {
        dos: SvgIcons .Check,
        donts: SvgIcons .Cross
    }

    return ( ! isEmpty( option )  &&  ( option in IconMap ) )
                ?   IconMap[ option ]      //  Icono seleccionado
                :   IconMap[ dos ];        //  Icono por defecto
}