//  webpack.config.js
const path = require( 'path' );

module .exports = ( env, argv ) => ({
    entry: path .resolve( __dirname + '/assets/src/js/main.js' ),
    output: {
        path: path .resolve( __dirname + '/assets/dist' ),
        filename: 'js/[name].js'
    }
});