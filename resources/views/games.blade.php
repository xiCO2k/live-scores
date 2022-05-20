<div class='mx-2 my-1 space-y-1'>
    <div class="px-1 bg-green text-black font-bold">Select a game:</div>
    @foreach ($leagues as $league)
        <div>
            <x-league-title
                :category="$league['Cnm']"
                :stage="$league['Snm']"
            />

            @foreach ($league['Events'] as $game)
                <x-game-option
                    :active="$active"
                    :game="$game"
                />
            @endforeach
        </div>
    @endforeach
</div>
