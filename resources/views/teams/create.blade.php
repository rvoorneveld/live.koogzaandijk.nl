@extends('layouts.app')

@section('content')
    <h1>Create a team</h1>

    <form method="POST" action="/teams">
        @csrf

        <div class="field">
            <label class="label" for="name">Name</label>
            <div class="control">
                <input type="text" class="input" id="name" name="name">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create team</button>
                <a href="javascript:history.back();">Cancel</a>
            </div>
        </div>

    </form>
@endsection
