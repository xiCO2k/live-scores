<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Http;
use LaravelZero\Framework\Commands\Command;
use function Termwind\{render, live, select, terminal};

class GamesCommand extends Command
{
    protected $signature = 'games';

    public function handle()
    {
        $select = select(fn ($options, $active) => view('games', [
            'leagues' => $this->getAvailableGames(),
            'active' => $active,
        ]), collect($this->getAvailableGames())->pluck('games')->flatten(1)->toArray());

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

    private function getAvailableGames()
    {
        return [[
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
            ]]
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
            ]]
        ], [
            'country' => 'Germany',
            'name' => 'Bundesliga',
            'games' => [[
                'value' => 2,
                'time' => now()->format('i:s'),
                'home' => [
                    'team' => 'B. Monchengladbach',
                    'total' => 2,
                ],
                'away' => [
                    'team' => 'Eintracht Frankfurt',
                    'total' => 1,
                ],
            ]]
        ]];
    }

    private function getScores(): array
    {
        return [
            'home' => [
                'team' => 'B. Monchengladbach',
                'total' => 2,
            ],
            'away' => [
                'team' => 'Eintracht Frankfurt',
                'total' => 1,
            ],
        ];
    }

    private function getEvents(): array
    {
        return [[
            'team' => 'home',
            'type' => 'goal',
            'minute' => 6,
            'player' => 'Neuhaus F.',
            'extra' => 'Scally J.',
        ], [
            'team' => 'away',
            'type' => 'sub',
            'minute' => 28,
            'out' => 'Jakic K.',
            'in' => 'Rode S.',
        ], [
            'team' => 'away',
            'type' => 'card',
            'card' => 'yellow',
            'minute' => 39,
            'player' => 'Tuta',
        ], [
            'team' => 'away',
            'type' => 'card',
            'card' => 'yellow',
            'minute' => 42,
            'player' => 'Borre R.',
        ], [
            'team' => 'home',
            'type' => 'card',
            'card' => 'yellow',
            'minute' => 43,
            'player' => 'Embolo B.',
        ], [
            'team' => 'away',
            'type' => 'goal',
            'minute' => 45,
            'player' => 'Borre R.',
        ], [
            'type' => 'halftime',
        ], [
            'team' => 'home',
            'type' => 'goal',
            'minute' => 50,
            'player' => 'Lindstrom J.',
        ], [
            'team' => 'home',
            'type' => 'goal',
            'minute' => 54,
            'player' => 'Bensebaini R.',
            'extra' => '(Penalti)',
        ], [
            'team' => 'away',
            'type' => 'goal',
            'minute' => 55,
            'player' => 'Kamada D.',
        ], [
            'team' => 'away',
            'type' => 'card',
            'card' => 'red',
            'minute' => 76,
            'player' => 'Borre R.',
        ]];
    }
}
