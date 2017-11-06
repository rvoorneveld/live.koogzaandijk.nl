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

        <app-dialog></app-dialog>

    </div>

    <link rel="stylesheet" href="/assets/css/app.css">
    <script src="/assets/js/app.js"></script>
</body>
</html>