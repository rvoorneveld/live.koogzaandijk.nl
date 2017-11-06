@extends('layouts.default')
@section('content')
    <md-layout md-gutter="24" class="wrapper">
        <md-layout md-flex="40" md-flex-small="100">

            <div class="matchboard__match">

                    <span class="matchboard__manipulate matchboard__manipulate--home">
                        <md-button class="md-icon-button md-raised md-accent" @click="openDialog('manipulateMatchboardScoreBox');" >
                            <md-icon>add</md-icon>
                        </md-button>
                    </span>
                   <span class="matchboard__manipulate matchboard__manipulate--away">
                        <md-button class="md-icon-button md-raised md-accent">
                            <md-icon>add</md-icon>
                        </md-button>
                    </span>

                <span class="matchboard__match--time">
                    <span class="matchboard__match--rotate">20:00</span>
                </span>
                <span class="matchboard__match--date">
                    <span class="matchboard__match--date__day">15</span>
                    <span class="matchboard__match--date__month">NOV</span>
                </span>
                <span class="matchboard__match--teams">
                    <span class="matchboard__match--teams__home">KZ/Hiltex 1</span>
                    <span class="matchboard__match--teams__away">PKC/SWKGroep 1</span>
                </span>
                <span class="matchboard__match--score">
                    <span class="matchboard__match--score__home">31</span>
                    <span class="matchboard__match--score__away">28</span>
                </span>
            </div>

            <div class="matchboard__match">
                <span class="matchboard__match--time">
                    <span class="matchboard__match--rotate">20:00</span>
                </span>
                <span class="matchboard__match--date">
                    <span class="matchboard__match--date__day">15</span>
                    <span class="matchboard__match--date__month">NOV</span>
                </span>
                <span class="matchboard__match--teams">
                    <span class="matchboard__match--teams__home">KZ/Hiltex 1</span>
                    <span class="matchboard__match--teams__away">PKC/SWKGroep 1</span>
                </span>
                <span class="matchboard__match--score">
                    <span class="matchboard__match--score__home">31</span>
                    <span class="matchboard__match--score__away">28</span>
                </span>
            </div>

            <div class="matchboard__match">
                <span class="matchboard__match--time">
                    <span class="matchboard__match--rotate">20:00</span>
                </span>
                <span class="matchboard__match--date">
                    <span class="matchboard__match--date__day">15</span>
                    <span class="matchboard__match--date__month">NOV</span>
                </span>
                <span class="matchboard__match--teams">
                    <span class="matchboard__match--teams__home">KZ/Hiltex 1</span>
                    <span class="matchboard__match--teams__away">PKC/SWKGroep 1</span>
                </span>
                <span class="matchboard__match--score">
                    <span class="matchboard__match--score__home">31</span>
                    <span class="matchboard__match--score__away">28</span>
                </span>
            </div>

            <div class="matchboard__match">
                <span class="matchboard__match--time">
                    <span class="matchboard__match--rotate">20:00</span>
                </span>
                <span class="matchboard__match--date">
                    <span class="matchboard__match--date__day">15</span>
                    <span class="matchboard__match--date__month">NOV</span>
                </span>
                <span class="matchboard__match--teams">
                    <span class="matchboard__match--teams__home">KZ/Hiltex 1</span>
                    <span class="matchboard__match--teams__away">PKC/SWKGroep 1</span>
                </span>
                <span class="matchboard__match--score">
                    <span class="matchboard__match--score__home">31</span>
                    <span class="matchboard__match--score__away">28</span>
                </span>
            </div>

        </md-layout>
        <md-layout md-flex-small="100">
            social media
        </md-layout>
        <md-layout md-flex-small="100">
            banners
        </md-layout>
    </md-layout>

@stop