@if ($event['team'] === 'home')
    <div class="w-full">
        <b>{{ $event['minute'] }}'</b>
        <span class="mx-1 text-{{ $event['card'] }}-500">▒</span>
        <span>{{ $event['player'] }}</span>
    </div>
@else
    <div class="w-full text-right">
        <span>{{ $event['player'] }}</span>
        <span class="mx-1 text-{{ $event['card'] }}-500">▒</span>
        <b>{{ $event['minute'] }}'</b>
    </div>
@endif
