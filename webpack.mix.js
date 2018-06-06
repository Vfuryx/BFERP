let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');



/*
mix.webpackConfig({
    resolve: {
        module: {
            rules: [
                {
                    test: /\.svg$/,
                    loader: 'svg-sprite-loader',
                    include: [path.resolve(__dirname, 'resources/assets/js/icons')],
                    options: {
                        symbolId: 'icon-[name]'
                    }
                },
                {
                    test: /\.(png|jpe?g|gif|svg)(\?.*)?$/,
                    loader: 'url-loader',
                    exclude: [path.resolve(__dirname, 'resources/assets/js/icons/svg')],
                    options: {
                        limit: 10000,
                        name: ('images/[name].[hash:7].[ext]')
                    }
                }
            ]
        }
    }
});*/
