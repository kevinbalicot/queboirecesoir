<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Model;

use App\DrinkPrediction\Domain\Enum\BeerStyleEnum;
use App\DrinkPrediction\Domain\Enum\ForcePredictionEnum;

interface DrinkPredictionInterface
{
    public function getPrediction(): array;

    public function getProfile(): DrinkerProfileInterface;

    public function predictDrink(BeerStyleEnum $beerStyle, ForcePredictionEnum $force): void;
}
