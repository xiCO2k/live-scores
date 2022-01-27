@if ($event['team'] === 'home')
    <div class="w-full space-x-1">
        <b>{{ $event['minute'] }}'</b>
        <span class="font-bold text-green-600">GOAL!</span>
        <span>{{ $event['player'] }}</span>
        @if ($event['extra'] ?? false)
            <i class="text-gray-600">{{ $event['extra'] }}</i>
        @endif
    </div>
@else
    <div class="w-full space-x-1 text-right">
        @if ($event['extra'] ?? false)
            <i class="text-gray-600">{{ $event['extra'] }}</i>
        @endif
        <span>{{ $event['player'] }}</span>
        <span class="font-bold text-green-600">GOAL!</span>
        <b>{{ $event['minute'] }}'</b>
    </div>
@endif
