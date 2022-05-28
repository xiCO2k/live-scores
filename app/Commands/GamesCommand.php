<?php

namespace App\Commands;

use App\Scores;
use LaravelZero\Framework\Commands\Command;
use function Termwind\live;

class GamesCommand extends Command
{
    protected $signature = 'games';

    public function handle(Scores $scores): void
    {
        $updateInSeconds = 20;
        $sports = $this->getScores();

        live(function () use (&$updateInSeconds, &$sports) {
            if ($updateInSeconds === 0) {
                $sports = $this->getScores();
                $updateInSeconds = 20;
            }

            return view('games', [
                'sports' => $sports,
                'updateInSeconds' => --$updateInSeconds,
            ]);
        })->refreshEvery(seconds: 1);
    }

    private function getScores(): array
    {
        return (new Scores())->getScores();
    }
}
