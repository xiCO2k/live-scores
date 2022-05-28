<?php

namespace App\Commands;

use App\Scores;
use LaravelZero\Framework\Commands\Command;
use function Termwind\live;

class GamesCommand extends Command
{
    protected $signature = 'games
                            {--sports= : The sports you want to only want to show}';

    public function handle(Scores $scores): void
    {
        $sportsToShow = explode(',', $this->option('sports'));
        $updateInSeconds = 20;
        $sports = $this->getScores($sportsToShow);

        live(function () use (&$updateInSeconds, &$sports, $sportsToShow) {
            if ($updateInSeconds === 0) {
                $sports = $this->getScores($sportsToShow);
                $updateInSeconds = 20;
            }

            return view('games', [
                'sports' => $sports,
                'updateInSeconds' => --$updateInSeconds,
            ]);
        })->refreshEvery(seconds: 1);
    }

    /**
     * @param $sportsToShow string[]
     */
    private function getScores(array $sportsToShow = []): array
    {
        return (new Scores())->getScores($sportsToShow);
    }
}
