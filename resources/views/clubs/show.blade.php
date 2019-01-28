@extends('layouts.app')

@section('content')
    <div style="display: flex; align-items: center;">
        <h1 style="margin-right: auto;">{{ $club->name }}</h1>
    </div>

    <a href="/clubs">Go back</a>
@endsection
