@extends('layouts.app')

@section('content')
    <h1>Create a member</h1>

    <form method="POST" action="/members">
        @csrf

        <div class="field">
            <label class="label" for="firstname">Firstname</label>
            <div class="control">
                <input type="text" class="input" id="firstname" name="firstname">
            </div>
        </div>

        <div class="field">
            <label class="label" for="lastname">Lastname</label>
            <div class="control">
                <input type="text" class="input" id="lastname" name="lastname">
            </div>
        </div>

        <div class="field">
            <label class="label" for="gender">Gender</label>
            <div class="control">
                <select id="gender" name="gender" class="input">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create member</button>
                <a href="javascript:history.back();">Cancel</a>
            </div>
        </div>

    </form>
@endsection
