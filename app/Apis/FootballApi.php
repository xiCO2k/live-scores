<?php

namespace App\Apis;

use Illuminate\Support\Collection;

class FootballApi extends LiveScoresApi
{
    public function makeRequest(): Collection
    {
        return $this->client()
            ->get('/soccer/1.00?MD=1')
            ->throw()
            ->collect();
    }
}
