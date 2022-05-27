<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface ScoresApi
{
    public function fetch(): Collection;
}
