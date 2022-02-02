<div class='mx-2 my-1'>
    <div class="px-1 bg-green text-black font-bold">Select a game:</div>

    @foreach ($leagues as $league)
        <div class="mt-1">
            <b class="uppercase">{{ $league['country'] }}</b> - {{ $league['name'] }}
        </div>
        @foreach ($league['games'] as $game)
            <div>
                <span class="mr-2">
                    @if ($active && $active['value'] === $game['value'])
                        <b class="text-green">✔</b>
                    @else
                        -
                    @endif
                </span>
                <b class="text-black px-1 bg-blue-300 mr-2">
                    {{ $game['time'] }}
                </b>
                <span class="text-right">
                    {{ $game['home']['team'] }}
                    <b class="px-1 bg-gray-600">
                        {{ $game['home']['total'] }}
                    </b>
                </span>
                <span class="text-gray mx-1">x</span>
                <span class="text-left">
                    <b class="px-1 bg-gray-600">
                        {{ $game['away']['total'] }}
                    </b>
                    {{ $game['away']['team'] }}
                </span>
            </div>
        @endforeach
    @endforeach
</div>
