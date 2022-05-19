<div class='mx-2 my-1'>
    <div class="px-1 bg-green text-black font-bold">Select a game:</div>

    @foreach ($leagues as $league)
        <div class="mt-1">
            <b class="uppercase">{{ $league['Cnm'] }}</b> - {{ $league['Snm'] }}
        </div>
        @foreach ($league['Events'] as $game)
            <div>
                <span class="mr-2">
                    @if ($active && $active['value'] === $game['value'])
                        <b class="text-green">✔</b>
                    @else
                        -
                    @endif
                </span>
                <b class="text-red-500 mr-2">
                    {{ $game['Eps'] }}
                </b>
                <span class="text-right">
                    {{ $game['T1'][0]['Nm'] }}
                    <b class="px-1 bg-gray-600">
                        {{ $game['Tr1'] }}
                    </b>
                </span>
                <span class="text-gray mx-1">x</span>
                <span class="text-left">
                    <b class="px-1 bg-gray-600">
                        {{ $game['Tr2'] }}
                    </b>
                    {{ $game['T2']['0']['Nm'] }}
                </span>
            </div>
        @endforeach
    @endforeach
</div>
