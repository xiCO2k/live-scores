<?php

namespace App;

use App\Apis\BasketballApi;
use App\Apis\FootballApi;
use App\Apis\HockeyApi;
use App\Contracts\ScoresApi;
use Illuminate\Support\Collection;

class Scores
{
    /**
     * List of supported Sports.
     *
     * @var array<string, class-string>
     */
    public static $sportsAvailable = [
        'football' => FootballApi::class,
        'basketball' => BasketballApi::class,
        'hockey' => HockeyApi::class,
    ];

    /**
     * Gets the Scores from the multiple sports available.
     *
     * @param $sportsToShow string[]
     * @return array<string, Collection>
     */
    public function getScores(array $sportsToShow = []): array
    {
        $data = [];
        $sports = self::$sportsAvailable;

        $sportsToShow = array_filter($sportsToShow);
        if ($sportsToShow !== []) {
            $sports = collect(self::$sportsAvailable)
                ->filter(fn ($class, $sport) => in_array($sport, $sportsToShow));
        }

        foreach ($sports as $sport => $class) {
            /** @var ScoresApi $class */
            $data[$sport] = (new $class())->fetch();
        }

        return $data;
    }
}
