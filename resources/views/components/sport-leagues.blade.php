@props(['sport', 'leagues', 'title', 'titleClass'])
<div class="px-2 uppercase font-bold {{ $titleClass }}">{{ $title }}</div>
@forelse ($leagues as $league)
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
@empty
    <div class="text-gray italic">There are no live games currently in progress...</div>
@endforelse
