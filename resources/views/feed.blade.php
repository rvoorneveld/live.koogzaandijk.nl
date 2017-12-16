@extends('layout')

@section('content')

    <div class="row">

        <div class="grid">

            @if (false === empty($activeMatches))

                <div class="grid__item soft--top one-whole grid__item--no-padding"><!--
                @foreach($activeMatches as $match)

                    @php
                        $day = ($objDate = \Carbon\Carbon::createFromFormat('Y-m-d',$match->date))->format('j');
                        $month = strtoupper($objDate->format('M'));
                    @endphp

                    --><div class="grid__item grid__item--no-padding one-third lap-one-half palm-one-whole">

                        <div class="grid__item one-whole lap-one-half palm-one-whole">
                            <div class="matchboard__match">
                                <!--<a href="javascript:;" data-match-id="{{ $match->matches_id }}" data-team-id="{{ $match->team_home_id }}" data-team-name="{{ $match->team_home_name }}" data-team-type="home" class="matchboard__manipulate matchboard__manipulate--home js-score-create">+</a>
                                <a href="javascript:;" data-match-id="{{ $match->matches_id }}" data-team-id="{{ $match->team_away_id }}" data-team-name="{{ $match->team_away_name }}" data-team-type="away" class="matchboard__manipulate matchboard__manipulate--away js-score-create">+</a>-->
                                <span class="matchboard__match--time matchboard__match--live">
                                    <span class="matchboard__match--rotate matchboard__match--rotate__left">&#149;&nbsp;LIVE</span>
                                    <span class="matchboard__match--rotate matchboard__match--rotate__right">{{ $match->time }}</span>
                                </span>
                                <span class="matchboard__match--teams">
                                    <span class="matchboard__match--teams__home soft--left">{{ $match->team_home_name }}</span>
                                    <span class="matchboard__match--teams__away soft--left">{{ $match->team_away_name }}</span>
                                </span>
                                <span class="matchboard__match--score">
                                    <span class="matchboard__match--score__home">
                                        {{ $match->team_home_score ?? 0 }}

                                    </span>
                                    <span class="matchboard__match--score__away">
                                        {{ $match->team_away_score ?? 0 }}
                                    </span>
                                </span>
                            </div>
                        </div>

                    </div><!--

                @endforeach

                --></div>
            @endif

            @php
                $softTop = (false === empty($activeMatches)) ? ' soft--top' : '';
            @endphp

            <div class="grid__item{{ $softTop }} one-whole grid__item--no-padding"><!--

                @if (count($matches) > 0)

                    @foreach($matches as $strPoule => $arrMatches)

                        @php
                            $pouleWidth = ('Senioren' === $strPoule) ? 'four-eighths' : 'two-eighths';
                            $matchWidth = ('Senioren' === $strPoule) ? 'one-quarter' : 'one-half';
                        @endphp

                        --><div class="grid__item grid__item--no-padding {{ $pouleWidth }} lap-one-whole palm-one-whole">
                                <h3 class="heading--fancy">{{ $strPoule }}</h3><!--

                        @foreach($arrMatches as $key => $match)

                            @php
                                $day = ($objDate = \Carbon\Carbon::createFromFormat('Y-m-d',$match->date))->format('j');
                                $month = strtoupper($objDate->format('M'));
                                $grayscale = false === $match->isToday ? ' matchboard__match--grayscale' : '';
                            @endphp

                            --><div class="grid__item {{ $matchWidth }} lap-one-whole palm-one-whole">
                                    <div class="matchboard__match{{ $grayscale }}">
                                        <span class="matchboard__match--time">
                                            <span class="matchboard__match--rotate">
                                                @if(true === $match->isToday)
                                                    {{ $match->time }}
                                                @elseif(true === $match->isSaturday)
                                                    zaterdag
                                                @elseif(true === $match->isSunday)
                                                    zondag
                                                @else
                                                    {{ $day }}&nbsp;{{ $month }}
                                                @endif
                                            </span>
                                        </span>
                                        <!--<span class="matchboard__match--date">
                                            <span class="matchboard__match--date__day">{{ $day }}</span>
                                            <span class="matchboard__match--date__month">{{ $month }}</span>
                                        </span>-->
                                            <span class="matchboard__match--teams">
                                            <span class="matchboard__match--teams__home">{{ $match->team_home_name }}</span>
                                            <span class="matchboard__match--teams__away">{{ $match->team_away_name }}</span>
                                        </span>
                                            <span class="matchboard__match--score">
                                            <span class="matchboard__match--score__home">{{ $match->team_home_score ?? 0 }}</span>
                                            <span class="matchboard__match--score__away">{{ $match->team_away_score ?? 0 }}</span>
                                        </span>
                                    </div>
                                </div><!--

                        @endforeach
                            --></div><!--
                    @endforeach
                @endif

            --></div><!--

        --></div>

    </div>
@stop

@section('scripts.footer')

    <!--<script src="https://js.pusher.com/3.2/pusher.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.6.0/socket.io.js"></script>-->
    <!--<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>-->
    <!--<script src="/js/lightbox.js"></script>
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
    </script>-->

@stop
