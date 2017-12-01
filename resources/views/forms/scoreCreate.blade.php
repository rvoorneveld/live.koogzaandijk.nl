<form class="form-standard" method="post" action="/score">

    {{ csrf_field() }}

    <h2>Voeg score toe voor {{ $teamName }}</h2>

    @if($isClubteam && null !== $players)
        <h3>Wie heeft er gescoord?</h3>
        <select name="playerId">
            <option value="">Kies een speler/speelster</option>
            @foreach ($players as $player)
                <option value="{{ $player->team_member_id }}">{{ $player->firstname }} {{ $player->lastname }}</option>
            @endforeach
        </select>
    @endif

    <h3>Wat voor type doelpunt?</h3>
    <select name="scoreTypeId">
        <option value="">Kies een type</option>
        @foreach ($types as $id => $type)
            <option value="{{ $id }}">{{ $type }}</option>
        @endforeach
    </select>

    <div class="soft--top">
        <input type="submit" name="submit" value="submit" />
    </div>

    <input type="hidden" name="matchId" value="{{ $matchId }}">
    <input type="hidden" name="scoreHome" value="{{ $scoreHome }}">
    <input type="hidden" name="scoreAway" value="{{ $scoreAway }}">

</form>