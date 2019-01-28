@extends('layouts.app')

@section('content')
    <div class="flex items-center mb-3">
        <h1 class="mr-auto">Clubs</h1>
        <a href="/clubs/create">Create club</a>
    </div>

    @if (false === empty($clubs))
        <table class="bg-white w-2/3 m-auto rounded shadow">
            <tr>
                <td class="px-5">Name</td>
                <td>Created</td>
                <td>Modified</td>
            </tr>
        @forelse($clubs as $club)
            <tr>
                <td class="px-5"><a href="{{ $club->path() }}">{{ $club->name }}</a></td>
                <td>{{ $club->created_at }}</td>
                <td>{{ $club->updated_at }}</td>
            </tr>
            @empty
                <tr>
                    <td colspan="4">No clubs yet</td>
                </tr>
        @endforelse
        </table>
    @endif
@endsection
