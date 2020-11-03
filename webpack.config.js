//  webpack.config.js
const 
    path = require( 'path' ),
    MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );

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
    },
    devtool: 'source-map',
    module: {
        rules: [
            {
                test: /\.js$/,
                include: [ JS ],
                exclude: /node_modules/,
                use: 'babel-loader'
            },
            {
                test: /\.css$/,
                exclude: /node_modules/,
                use: [ 
                    MiniCssExtractPlugin .loader, 
                    'css-loader' 
                ]
            },
            {
                test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
                use: {
                    loader: 'file-loader',
                    options: {
                        name: '[path][name].[ext]',
                        publicPath: 'production' === process .env .NODE_ENV ? '../' : '../../'
                    }
                }
            }
        ]
    }
});