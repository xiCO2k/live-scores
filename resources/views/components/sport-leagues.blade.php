@props(['sport', 'leagues', 'title', 'titleClass'])
<div class="px-3 uppercase font-bold {{ $titleClass }}">{{ $title }}</div>
    @foreach ($leagues as $league)
        <div>
            <x-league-title
                :category="$league['category']"
                :stage="$league['stage']"
            />

            @foreach ($league['games'] as $game)
                <x-game-option
                    :active="$active ?? false"
                    :game="$game"
                />
            @endforeach
        </div>
    @endforeach
</div>
