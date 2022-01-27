<div class="mx-2">
    <div class="w-70">
        <x-header
            :time="$time"
            :time-label="$timeLabel"
            :score="$score"
        />
        @foreach($events as $event)
            @if ($event['type'] === 'goal')
                <x-event-goal :event="$event" />
            @elseif ($event['type'] === 'sub')
                <x-event-sub :event="$event" />
            @elseif ($event['type'] === 'card')
                <x-event-card :event="$event" />
            @elseif ($event['type'] === 'halftime')
                <hr class="w-full" />
            @endif
        @endforeach
    </div>
</div>
