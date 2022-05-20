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
        {{ $game['Eps'] }}
    </b>
    <span class="text-right">
        {{ $game['T1']['0']['Nm'] }}
        <b class="px-1 bg-gray-600">
            {{ $game['Tr1'] ?? '0' }}
        </b>
    </span>
    <span class="text-gray mx-1">x</span>
    <span class="text-left">
        <b class="px-1 bg-gray-600">
            {{ $game['Tr2'] ?? '0' }}
        </b>
        {{ $game['T2']['0']['Nm'] }}
    </span>
</div>
