//  webpack.config.js
const path = require( 'path' );

//  Rutas de archivos
const 
    JS = path .resolve( __dirname + '/assets/src/js' ),
    IMG = path .resolve( __dirname + '/assets/src/images' ),
    BUILD = path .resolve( __dirname + '/build' );

module .exports = ( env, argv ) => ({
    entry: {
        main: JS + '/main.js',
        single: JS + '/single.js'
    },
    output: {
        path: BUILD,
        filename: 'js/[name].js'
    }
});