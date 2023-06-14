<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Model;

use App\DrinkPrediction\Domain\Enum\BeerStyleEnum;
use App\DrinkPrediction\Domain\Enum\ForcePredictionEnum;

class DrinkPrediction implements DrinkPredictionInterface
{
    private array $prediction;

    public function __construct()
    {
        $this->prediction = array_reduce(BeerStyleEnum::getStyles(), function (array $prediction, BeerStyleEnum $beerStyle): array {
            $prediction[BeerStyleEnum::getName($beerStyle)] = 0;

            return $prediction;
        }, []);
    }

    public function getPrediction(): array
    {
        return $this->normalizePrediction();
    }

    public function predictDrink(BeerStyleEnum $beerStyle, ForcePredictionEnum $force): void
    {
        $this->prediction[BeerStyleEnum::getName($beerStyle)] += ForcePredictionEnum::getForce($force);
    }

    private function normalizePrediction(): array
    {
        $total = array_reduce(array_values($this->prediction), fn (int $total, int $force): int => $total + $force, 0);

        return array_reduce(
            array_keys($this->prediction),
            function (array $prediction, string $beerStyle) use ($total): array {
                if (0 === $total) {
                    $prediction[$beerStyle] = 0;
                } else {
                    $prediction[$beerStyle] = (1 * $this->prediction[$beerStyle]) / $total;
                }

                return $prediction;
            },
            []
        );
    }
}
