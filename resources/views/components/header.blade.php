<div class="w-full text-center text-red-400">
    {{ $timeLabel }} - <b>{{ $time }}</b>
</div>
<div class="w-full mb-1">
    <span class="pr-1 w-1/2 text-right">
        {{ $score['home']['team'] }}
        <b class="ml-1 px-1 bg-gray-600">
            {{ $score['home']['total'] }}
        </b>
    </span>
    <span class="pl-1 w-1/2 text-left">
        <b class="px-1 bg-gray-600">
            {{ $score['away']['total'] }}
        </b>
        {{ $score['away']['team'] }}
    </span>
</div>
