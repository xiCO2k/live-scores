<?php

namespace App\Apis;

use Illuminate\Support\Collection;

class HockeyApi extends LiveScoresApi
{
    public ?string $endpointPath = '/hockey';
}
