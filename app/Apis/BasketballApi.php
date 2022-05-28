<?php

namespace App\Apis;

use Illuminate\Support\Collection;

class BasketballApi extends LiveScoresApi
{
    public ?string $endpointPath = '/basketball';
}
