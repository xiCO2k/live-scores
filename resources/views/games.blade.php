<div class='mx-2 my-1 space-y-1'>
    {{-- <div class="px-1 bg-green text-black font-bold">Select a game:</div> --}}
    @foreach ($sports as $sport => $leagues)
        @switch ($sport)
            @case('football')
                <x-sport-leagues
                    :sport="$sport"
                    :leagues="$leagues"
                    title="⚽️ Football"
                    title-class="bg-green-300 text-black"
                />
            @break
            @case('basketball')
                <x-sport-leagues
                    :sport="$sport"
                    :leagues="$leagues"
                    title="🏀 Basketball"
                    title-class="bg-orange-300 text-black"
                />
            @break
        @endswitch
    @endforeach
</div>
