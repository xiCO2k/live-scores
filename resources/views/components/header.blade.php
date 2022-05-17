<div class="w-full flex text-center text-red-400 space-x-1">
    <span class="flex-1 text-right">{{ $timeLabel }}</span>
    <span>-</span>
    <b class="flex-1">{{ $time }}</b>
</div>
<div class="w-full flex space-x-1">
    <span class="flex-1 text-right">
        {{ $score['home']['team'] }}
        <b class="ml-1 px-1 bg-gray-600">
            {{ $score['home']['total'] }}
        </b>
    </span>
    <span class="text-gray">x</span>
    <span class="flex-1 text-left">
        <b class="px-1 bg-gray-600">
            {{ $score['away']['total'] }}
        </b>
        {{ $score['away']['team'] }}
    </span>
</div>
