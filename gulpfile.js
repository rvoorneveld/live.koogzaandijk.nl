var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass([
        'app.scss'
    ],'resources/assets/css/app.css')
       .styles([
        '../../../node_modules/vue-material/dist/vue-material.css',
        '../../../resources/assets/css/app.css',
    ],'public/assets/css/app.css')
       .webpack('resources/assets/js/app.js', 'public/assets/js/app.js');

});
