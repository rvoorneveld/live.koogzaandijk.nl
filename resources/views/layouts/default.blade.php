<!DOCTYPE html>
<html lang="en">
<head>
    <meta name=viewport content="width=device-width,initial-scale=1,minimal-ui">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

    <div id="app">

        <md-whiteframe md-tag="md-toolbar" md-elevation="3">
            <span class="md-title">KZ/Hiltex Live</span>
        </md-whiteframe>

        @yield('content')

    </div>

    <link rel="stylesheet" href="/assets/css/app.css">
    <script src="/assets/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.2/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-material/0.8.1/vue-material.js"></script>
    <script>
        Vue.use(VueMaterial);
        Vue.material.registerTheme('default', {
            primary: 'blue',
            accent: 'white',
        })
        var App = new Vue({
            el: '#app'
        });
    </script>
</body>
</html>