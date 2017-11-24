@extends('layout')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <h1>Stap 2. Details</h1>

            <form method="POST" action="/save-step-details">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="message_name">Naam*:</label>
                    <input type="text" name="message_name" id="message_name" class="form-control" value="{{ old('message_name') }}">
                </div>

                <div class="form-group">
                    <label for="message_title">Titel*:</label>
                    <input type="text" name="message_title" id="message_title" class="form-control" value="{{ old('message_title') }}">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary pull-right" name="submit" value="Deel!">
                </div>

            </form>

        </div>
    </div>

@stop