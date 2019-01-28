@extends('layouts.app')

@section('content')
    <div style="display: flex; align-items: center;">
        <h1 style="margin-right: auto;">{{ $team->name }}</h1>
        <a href="/members/create">Create member</a>
    </div>

    <ul>
        @forelse($team->members as $member)
            <li>
                {{ $member->lastname }}, {{ $member->firstname }}
            </li>
        @empty
            <li>No members yet</li>
        @endforelse
    </ul>

    <a href="javascript:history.back();">Go back</a>
@endsection
