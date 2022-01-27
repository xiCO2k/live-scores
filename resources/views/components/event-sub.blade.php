@if ($event['team'] === 'home')
    <div class="w-full">
        <b>{{ $event['minute'] }}'</b>
        <span class="mx-1 text-green-400">↑</span>
        <span class="mr-1">{{ $event['in'] }}</span>
        <span class="mx-1 text-red-500">↓</span>
        <span class="text-gray-600">{{ $event['out'] }}</span>
    </div>
@else
    <div class="w-full text-right">
        <span class="text-gray-600">{{ $event['out'] }}</span>
        <span class="mx-1 text-red-500">↓</span>
        <span class="ml-1">{{ $event['in'] }}</span>
        <span class="mx-1 text-green-400">↑</span>
        <b>{{ $event['minute'] }}'</b>
    </div>
@endif
