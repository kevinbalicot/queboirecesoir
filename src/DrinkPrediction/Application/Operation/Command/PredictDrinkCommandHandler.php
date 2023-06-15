<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Application\Operation\Command;

use App\DrinkPrediction\Domain\Factory\DrinkPredictionFactory;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;
use App\DrinkPrediction\Domain\Predictor\PredicatorInterface;
use App\Shared\Application\Command\CommandHandlerInterface;

final readonly class PredictDrinkCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private PredicatorInterface $predicator
    ) {
    }

    public function __invoke(PredictDrinkCommand $drinkCommand): DrinkPredictionInterface
    {
        return $this->predicator->predictDrink(
            age: $drinkCommand->age,
            hairinessColor: $drinkCommand->hairinessColor,
            size: $drinkCommand->size,
            corpulence: $drinkCommand->corpulence,
            characters: $drinkCommand->characters,
            politicalOrientations: $drinkCommand->politicalOrientations,
            wayOfThinkings: $drinkCommand->wayOfThinkings
        );
    }
}
