<?php

namespace App\Commands;

use App\Lib\LiveFootball\GamesRepository;
use LaravelZero\Framework\Commands\Command;
use function Termwind\live;
use function Termwind\select;
use function Termwind\terminal;

class GamesCommand extends Command
{
    protected $signature = 'games';

    public function handle(GamesRepository $gamesRepository)
    {
        live(function () use ($gamesRepository) {
            $games = $gamesRepository->fetch();

            return view('games', [
                'leagues' => $games['Stages'],
                'active' => null,
            ]);
        })->refreshEvery(seconds: 20);












        return;
        $select = select(fn ($options, $active) => view('games', [
            'leagues' => $this->getAvailableGames(),
            'active' => $active,
        ]), $this->getAvailableGames(true));

        $select->refreshEvery(seconds: 1);
        $select->render();

        $active = $select->getActive();

        terminal()->clear();

        live(fn () => view('game', [
            'timeLabel' => '1st half',
            'time' => date('i:s'),
            'score' => $this->getScores(),
            'events' => $this->getEvents(),
        ]))->refreshEvery(seconds: 1);
    }

    private function getAvailableGames($onlyGames = false): array
    {
        $leagues = [[
            'country' => 'Italy',
            'name' => 'Serie A',
            'games' => [[
                'value' => 1,
                'time' => now()->subMinutes(87)->subSeconds(12)->format('i:s'),
                'home' => [
                    'team' => 'Juventus',
                    'total' => 0,
                ],
                'away' => [
                    'team' => 'Cagliari',
                    'total' => 0,
                ],
            ]],
        ], [
            'country' => 'Netherlands',
            'name' => 'Eredivisie',
            'games' => [[
                'value' => 3,
                'time' => now()->subMinutes(42)->subSeconds(21)->format('i:s'),
                'home' => [
                    'team' => 'AZ Alkmaar',
                    'total' => 0,
                ],
                'away' => [
                    'team' => 'Groningen',
                    'total' => 0,
                ],
            ]],
        ], [
            'country' => 'Portugal',
            'name' => 'Liga Bwin',
            'games' => [[
                'value' => 2,
                'time' => now()->format('i:s'),
                'home' => [
                    'team' => 'SL Benfica',
                    'total' => 3,
                ],
                'away' => [
                    'team' => 'FC Porto',
                    'total' => 1,
                ],
            ]],
        ]];

        if (! $onlyGames) {
            return $leagues;
        }

        return collect($leagues)->pluck('games')->flatten(1)->toArray();
    }

    private function getScores(): array
    {
        return [
            'home' => [
                'team' => 'SL Benfica',
                'total' => 3,
            ],
            'away' => [
                'team' => 'FC Porto',
                'total' => 1,
            ],
        ];
    }

    private function getEvents(): array
    {
        return [[
            'team' => 'home',
            'type' => 'card',
            'card' => 'yellow',
            'minute' => 16,
            'player' => 'Dias G.',
        ], [
            'team' => 'home',
            'type' => 'card',
            'card' => 'yellow',
            'minute' => 24,
            'player' => 'Ramos G.',
        ], [
            'team' => 'home',
            'type' => 'goal',
            'minute' => 28,
            'player' => 'Ramos G.',
        ], [
            'team' => 'away',
            'type' => 'card',
            'card' => 'yellow',
            'minute' => 30,
            'player' => 'Grujic M.',
        ], [
            'team' => 'away',
            'type' => 'card',
            'card' => 'yellow',
            'minute' => 40,
            'player' => 'Pepe',
        ], [
            'team' => 'home',
            'type' => 'goal',
            'minute' => 46,
            'player' => 'Nunes D.',
            'extra' => '(Penalti)',
        ], [
            'type' => 'halftime',
        ], [
            'team' => 'home',
            'type' => 'card',
            'card' => 'yellow',
            'minute' => 53,
            'player' => 'Nunez D.',
        ], [
            'team' => 'away',
            'type' => 'sub',
            'minute' => 61,
            'out' => 'Seferovic H.',
            'in' => 'Dias G.',
        ], [
            'team' => 'home',
            'type' => 'card',
            'card' => 'yellow',
            'minute' => 62,
            'player' => 'Lazaro V.',
        ], [
            'team' => 'home',
            'type' => 'goal',
            'minute' => 63,
            'player' => 'Ramos G.',
        ], [
            'team' => 'away',
            'type' => 'sub',
            'minute' => 64,
            'out' => 'Galeno',
            'in' => 'Evanilson',
        ], [
            'team' => 'home',
            'type' => 'card',
            'card' => 'yellow',
            'minute' => 71,
            'player' => 'Almeida A.',
        ], [
            'team' => 'home',
            'type' => 'card',
            'card' => 'yellow',
            'minute' => 71,
            'player' => 'Otamendi N.',
        ], [
            'team' => 'home',
            'type' => 'sub',
            'minute' => 73,
            'out' => 'Lazaro V.',
            'in' => 'João Mário',
        ], [
            'team' => 'home',
            'type' => 'sub',
            'minute' => 73,
            'out' => 'Ramos G.',
            'in' => 'Yaremchuk R.',
        ], [
            'team' => 'away',
            'type' => 'card',
            'card' => 'yellow',
            'minute' => 79,
            'player' => 'Taremi M.',
        ], [
            'team' => 'away',
            'type' => 'goal',
            'minute' => 95,
            'player' => 'Zaidu',
            'extra' => '(Pepê)',
        ], ];
    }
}
