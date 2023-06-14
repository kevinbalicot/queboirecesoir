<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Factory;

use App\DrinkPrediction\Domain\Model\DrinkPrediction;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;

class DrinkPredictionFactory
{
    public static function createNew(): DrinkPredictionInterface
    {
        return new DrinkPrediction();
    }
}
