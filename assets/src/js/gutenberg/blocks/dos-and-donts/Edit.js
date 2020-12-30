import { InnerBlocks } from '@wordpress/block-editor';

/** Inner Blocks */
import { INNER_BLOCKS } from './template';

const ALLOWED_BLOCKS = [ 'core/group' ];

const Edit = () => {

    return ( 
        <div className="aquila-dos-and-donts">
            <InnerBlocks
				template={ INNER_BLOCKS }
				allowedBlocks={ ALLOWED_BLOCKS }
				templateLock={ true }
			/>
        </div> 
    );
}

export default Edit;