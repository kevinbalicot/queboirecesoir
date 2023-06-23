<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Predictor;

use App\DrinkPrediction\Domain\Enum\AgeRangeEnum;
use App\DrinkPrediction\Domain\Enum\HairinessColorEnum;
use App\DrinkPrediction\Domain\Enum\SizeEnum;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;

interface PredicatorInterface
{
    public function predictDrink(
        AgeRangeEnum $age,
        HairinessColorEnum $hairinessColor,
        SizeEnum $size,
        array $characters,
        array $politicalOrientations,
        array $waysOfThinking,
    ): DrinkPredictionInterface;
}
