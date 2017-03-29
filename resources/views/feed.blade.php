@extends('layout')

@section('content')

    <div class="row">

        <div class="grid">

            <div class="grid__item two-eighths palm-one-whole">

                @foreach($matches as $match)

                <ul class="matchboard">
                   <li class="grid matchboard__match click-box">
                        <div class="matchboard__box">
                            <div class="grid__item one-fifth matchboard__date">
                                <span class="matchboard__date--day">12</span>
                                <span class="matchboard__date--month">Dec</span>
                            </div><!--
																--><div class="grid__item three-fifths matchboard__team">
                                <span class="matchboard__team--home">KZ/Hiltex</span>
                                <span class="matchboard__team--away">PKC/Hagero</span>
                            </div><!--
																--><div class="grid__item one-fifth matchboard__score">
                                <div class="matchboard__score--box">
                                    <span class="matchboard__score--home">12</span>
                                    <span class="matchboard__score--away">11</span>
                                </div>
                            </div>
                        </div>
                        <a class="click-box__link" href="" title=""><span class="click-box__body">Bekijk wedstrijd info</span></a>
                    </li>
                </ul>

                @endforeach

            </div><!--

         --><div class="grid__item six-eighths palm-one-whole"><!--

                @foreach($messages as $message)

                    @php
                        $media = ((! empty($message->message_media_first)) ? ' \''.$message->message_media_first.'\');"' : '');
                        $link = ((! empty($message->message_link)) ? $message->message_link : 'javascript:void(0);');
                    @endphp

                    --><div class="grid__item one-quarter palm-one-whole social-blocks__item">
                        <div class="social-content social-content--{{$message->message_type_name}} social-content__{{ $colors[array_rand($colors)] }}">

                            <p class="social-content--paragraph">
                                {{ $message->message_content }}
                            </p>

                            <div class="social-content--image-wrapper" style="background-image: url('{{ $message->message_media_first }}');"></div>
                            <a class="social-content__link" href="{{ $link  }}" target="_blank">
                                <div class="social-content__icon  social-content__icon--animated font-icon--standalone">
                                    <span class="font-icon__icon font-icon__icon--social" aria-hidden="true" data-icon="{{ $message->message_type_icon }}"></span>
                                </div>
                            </a>

                        </div>
                    </div><!--

                @endforeach
            --></div>

        </div>

    </div>
@stop

@section('scripts.footer')
    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.6.0/socket.io.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="/js/lightbox.js"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });

        (function(){

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('58b2959ae4b1a9f830b9', {
                encrypted: false
            });

            var channel = pusher.subscribe('feed');
            channel.bind('App\\Events\\MessageApproved', function(data) {

                swal({
                    title: 'Nieuw bericht',
                    html: 'Er is een nieuw bericht gepubliceerd door <strong>'+data.message.message_name+'</strong>',
                    type: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Bekijk bericht'
                }).then(function () {
                    window.scrollTo(0,0)
                    document.body.scrollTop =document.documentElement.scrollTop = 0;
                    window.location.reload(true);
                });

            });

        })();
    </script>

@stop

@section('addmessage')
    <a href="/add-media/" class="btn btn--main btn--center">
        Bericht toevoegen
    </a>
@stop