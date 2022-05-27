<?php

namespace App\Commands;

use App\Scores;
use LaravelZero\Framework\Commands\Command;
use function Termwind\live;

class GamesCommand extends Command
{
    protected $signature = 'games';

    public function handle(Scores $scores)
    {
        live(fn () => view('games', [
            'sports' => $scores->getScores(),
        ]))->refreshEvery(seconds: 20);
    }
}
