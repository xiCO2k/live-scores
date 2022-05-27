@props([
    'active' => null,
    'game' => [],
])
<div>
    <span class="mr-2">
        @if ($active && $active['value'] === $game['value'])
            <b class="text-green">✔</b>
        @else
            -
        @endif
    </span>
    <b class="text-red-500 w-6 mr-1">
        {{ $game['time'] }}
    </b>
    <span class="text-right">
        {{ $game['team_1']['name'] }}
        <b class="px-1 bg-gray-600">
            {{ $game['team_1']['score'] }}
        </b>
    </span>
    <span class="text-gray mx-1">x</span>
    <span class="text-left">
        <b class="px-1 bg-gray-600">
            {{ $game['team_2']['score'] }}
        </b>
        {{ $game['team_2']['name'] }}
    </span>
</div>
