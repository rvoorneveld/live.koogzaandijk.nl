@extends('layouts.app')

@section('content')
    <h1>Create a club</h1>

    <form method="POST" action="/clubs">
        @csrf

        <div class="field">
            <label class="label" for="name">Naam</label>
            <div class="control">
                <input type="text" class="input" id="name" name="name">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create club</button>
                <a href="javascript:history.back();">Cancel</a>
            </div>
        </div>

    </form>
@endsection
