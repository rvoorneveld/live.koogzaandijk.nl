module.exports = {
    // This is the "main" file which should include all other modules
    entry: __dirname + '/resources/assets/js/app.js',
    // Where should the compiled file go?
    output: {
        // To the `dist` folder
        path: __dirname + '/public/assets/js',
        // With the filename `build.js` so it's dist/build.js
        filename: 'app.js'
    },
    module: {
        loaders: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            }
        ]
    },
    resolve: {
        alias: {
            vue: 'vue/dist/vue.js'
        }
    }
};