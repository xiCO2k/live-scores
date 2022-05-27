<?php

namespace App\Lib\LiveFootball;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

/**
 * Use this class to get live from an api.
 */
class GamesRepository
{
    /**
     * Fetches all the current live games, returning a json object.
     * During development, you can set APP_ENV to local on your .env file
     * so that no unnecessary calls are made to the production api.
     *
     * @return mixed
     */
    public function fetch(): mixed
    {
        $data = env('APP_ENV') === 'local' ?
            Storage::disk('local')->get('GamesResponseMock.json') :
            Http::get('https://prod-public-api.livescore.com/v1/api/app/live/soccer/1.00?MD=1');

        return json_decode($data, true);
    }
}
