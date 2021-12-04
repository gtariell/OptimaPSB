let mix = require('laravel-mix');

mix
    .js('src/app.js', 'js')
    .sass('src/app.scss', 'css')
    .setPublicPath('public')
    .webpackConfig({
        resolve: {
            alias: {
                'jquery-ui': 'jquery-ui-dist/jquery-ui.js'
            }
        }
    })
    // .minify('public/js/app.js')
    .sourceMaps()
    .version();