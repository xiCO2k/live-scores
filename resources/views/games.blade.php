<div class='mx-2 my-1 space-y-1'>
    {{-- <div class="px-1 bg-green text-black font-bold">Select a game:</div> --}}
    @foreach ($sports as $sport => $leagues)
        @if ($sport === 'football')
            <x-sport-leagues
                :sport="$sport"
                :leagues="$leagues"
                title="⚽️ Football"
                title-class="bg-green-300 text-black"
            />
        @elseif ($sport === 'basketball')
            <x-sport-leagues
                :sport="$sport"
                :leagues="$leagues"
                title="🏀 Basketball"
                title-class="bg-orange-300 text-black"
            />
        @endif
        @elseif ($sport === 'hockey')
            <x-sport-leagues
                :sport="$sport"
                :leagues="$leagues"
                title="🏒 hockey"
                title-class="bg-gray-200 text-black"
            />
        @endif
    @endforeach

    <div class="italic text-gray">-- Updating scores in <b>{{ $updateInSeconds }}</b> {{ str()->plural('second', $updateInSeconds) }}.</div>
</div>
