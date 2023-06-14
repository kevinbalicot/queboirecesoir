<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Application\Operation\Command;

use App\DrinkPrediction\Domain\Factory\DrinkPredictionFactory;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;
use App\Shared\Application\Command\CommandHandlerInterface;

final class PredictDrinkCommandHandler implements CommandHandlerInterface
{
    public function __invoke(PredictDrinkCommand $drinkCommand): DrinkPredictionInterface
    {
        $drinkPrediction = DrinkPredictionFactory::createNew();

        return $this->predictWithIf($drinkPrediction);
    }

    private function predictWithIf(DrinkPredictionInterface $prediction): DrinkPredictionInterface
    {
        return $prediction;
    }
}
