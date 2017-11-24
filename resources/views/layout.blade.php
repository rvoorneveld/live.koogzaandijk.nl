<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.1.1/sweetalert2.css" />
    <link rel="stylesheet" href="/css/app.css" />
    <link rel="stylesheet" href="/css/lightbox.css" />
</head>
<body>
    <div id="app">
        <div class="l-header">
            <a href="http://live.koogzaandijk.dev" title="">
                <img class="site-logo" src="/images/logo.png" alt="" title="" />
            </a>
            <iframe id="sponsors_horizontal" src="http://www.sponsorportaal.nl/marquee/?id=510041347d247&amp;width=1084" frameborder="0" scrolling="no" width="100%" height="86px"></iframe>
            {{--@yield('addmessage')--}}
        </div>
        <div class="l-wrapper l-wrapper--content">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.js"></script>
<script src="https://cdn.jsdelivr.net/sweetalert2/6.1.1/sweetalert2.js"></script>-->
{{--<!--@yield('scripts.footer')-->--}}
{{--<!--@include('flash')-->--}}

</body>
</html>