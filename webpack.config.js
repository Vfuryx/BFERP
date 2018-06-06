const config = require('laravel-mix/setup/webpack.config');

// Exclude SVG from laravel-mix webpack config, we will handle them with vue-svg-loader
// See also: https://github.com/JeffreyWay/laravel-mix/issues/350
for (const rule of config.module.rules) {
    if (rule.test.toString() == '/\\.(woff2?|ttf|eot|svg|otf)$/') {
        rule.test = /\.(woff2?|ttf|eot|otf)$/;
    }
}

module.exports = config;