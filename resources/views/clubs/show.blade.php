<h1>{{ $club->name }}</h1>
<ul>
@forelse($club->teams as $team)
    <li>
        {{ $team->name }}
    </li>
    @empty
    <li>No teams yet</li>

@endforelse
</ul>
