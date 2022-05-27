<?php

use App\Apis\FootballApi;
use Illuminate\Http\Client\Factory;

it('handles the data from the live scores api', function () {
    $client = new Factory();
    $client->fake(['*' => json_decode(file_get_contents(__DIR__ . '/stubs/livescores_matches.stub'), true)]);

    $api = new FootballApi($client);

    expect($api->fetch())->sequence(
        fn ($league) => $league
        ->category->toBe('Georgia')
        ->stage->toBe('Erovnuli Liga')
        ->games->sequence(
            fn ($game) => $game
            ->time->toBe("36'")
            ->team_1->name->toBe('Sioni Bolnisi')
            ->team_1->score->toBe('0')
            ->team_2->name->toBe('Saburtalo')
            ->team_2->score->toBe('0')
        )
    );
});
