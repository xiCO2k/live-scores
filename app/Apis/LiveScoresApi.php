<?php

namespace App\Apis;

use App\Contracts\ScoresApi;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;

abstract class LiveScoresApi implements ScoresApi
{
    public function __construct(
        private Factory $client = new Factory(),
        private string $baseUrl = 'https://prod-public-api.livescore.com/v1/api/app/live',
    ) {
        // ..
    }

    public function fetch(): Collection
    {
        return collect($this->makeRequest()->get('Stages'))->map(fn ($league) => [
            'category' => $league['Cnm'],
            'stage' => $league['Snm'],
            'games' => collect($league['Events'])->map(fn ($event) => [
                'time' => $event['Eps'],
                'team_1' => [
                    'name' => $event['T1']['0']['Nm'],
                    'score' => $event['Tr1'] ?? '0',
                ],
                'team_2' => [
                    'name' => $event['T2']['0']['Nm'],
                    'score' => $event['Tr2'] ?? '0',
                ],
            ]),
        ]);
    }

    public function makeRequest(): Collection
    {
        return collect();
    }

    protected function client(): PendingRequest
    {
        return $this->client
            ->baseUrl($this->baseUrl)
            ->asJson()
            ->acceptJson();
    }
}
