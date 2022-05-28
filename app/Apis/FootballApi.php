<?php

namespace App\Apis;

use Illuminate\Support\Collection;

class FootballApi extends LiveScoresApi
{
    public ?string $endpointPath = '/football';
}
