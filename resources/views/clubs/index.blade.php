<h1>Clubs</h1>
@forelse($clubs as $club)
    <li>
        <a href="{{ $club->path() }}">{{ $club->name }}</a>
    </li>
    @empty
    <li>No clubs yet</li>
@endforelse

