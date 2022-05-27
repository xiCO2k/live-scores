<?php

namespace App\Apis;

use Illuminate\Support\Collection;

class BasketballApi extends LiveScoresApi
{
    public function makeRequest(): Collection
    {
        return $this->client()
            ->get('/basketball/1.00?MD=1')
            ->throw()
            ->collect();
    }
}
