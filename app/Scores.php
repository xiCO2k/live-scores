<?php

namespace App;

use App\Apis\BasketballApi;
use App\Apis\FootballApi;
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
    ];

    /**
     * Gets the Scores from the multiple sports available.
     *
     * @return array<string, Collection>
     */
    public function getScores(): array
    {
        $data = [];

        foreach (self::$sportsAvailable as $sport => $class) {
            /** @var ScoresApi $class */
            $data[$sport] = (new $class())->fetch();
        }

        return $data;
    }
}
