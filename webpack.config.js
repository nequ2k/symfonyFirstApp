const Encore = require('@symfony/webpack-encore');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .enableSingleRuntimeChunk()
    .addEntry('app', './assets/app.js')
    .addEntry('method2', './assets/javascript/method2.js')
    .addEntry('bootstrap_js', 'bootstrap/dist/js/bootstrap.bundle.min.js') // Unique name for Bootstrap JS
    .addStyleEntry('app', './assets/css/app.css') // Unique name for your app CSS
    .addStyleEntry('bootstrap_css', 'bootstrap/dist/css/bootstrap.min.css') // Unique name for Bootstrap CSS
    .splitEntryChunks()
    .copyFiles({
        from: './assets/images',
        to: 'images/[path][name].[hash:8].[ext]',
        pattern: /\.(png|jpg|jpeg)$/
    })
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = '3.23';
    })
    .enableStimulusBridge() // Enable Stimulus bridge for Bootstrap
;

module.exports = Encore.getWebpackConfig();
