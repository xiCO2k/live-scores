<?php

namespace App;

use App\Apis\BasketballApi;
use App\Apis\FootballApi;

class Scores
{
    /**
     * List of supported Sports
     *
     * @var string[]
     */
    public static $sportsAvailable = [
        'football' => FootballApi::class,
        'basketball' => BasketballApi::class,
    ];

    /**
     *
     */
    public function getScores()
    {
        $data = [];

        foreach (self::$sportsAvailable as $sport => $class) {
            $data[$sport] = (new $class())->fetch();
        }

        return $data;
    }
}
