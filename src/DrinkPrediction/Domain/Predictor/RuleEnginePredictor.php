<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Predictor;

use App\DrinkPrediction\Application\RuleEngine\PredictDrinkRuleEngineInterface;
use App\DrinkPrediction\Domain\Enum\AgeRangeEnum;
use App\DrinkPrediction\Domain\Enum\HairinessColorEnum;
use App\DrinkPrediction\Domain\Enum\SizeEnum;
use App\DrinkPrediction\Domain\Factory\DrinkerProfilFactory;
use App\DrinkPrediction\Domain\Factory\DrinkPredictionFactory;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;
use App\Shared\Application\Rule\RuleEngineException;
use App\Shared\Application\Rule\RuleException;

class RuleEnginePredictor implements PredicatorInterface
{
    public function __construct(
        private readonly PredictDrinkRuleEngineInterface $drinkRuleEngine
    ) {
    }

    /**
     * @throws RuleException
     * @throws RuleEngineException
     */
    public function predictDrink(
        AgeRangeEnum $age,
        HairinessColorEnum $hairinessColor,
        SizeEnum $size,
        array $characters,
        array $politicalOrientations,
        array $waysOfThinking
    ): DrinkPredictionInterface
    {
        $profile = DrinkerProfilFactory::createNew(
            $age,
            $hairinessColor,
            $size,
            $characters,
            $politicalOrientations,
            $waysOfThinking
        );

        $prediction = DrinkPredictionFactory::createNew($profile);

        ($this->drinkRuleEngine)($prediction);

        return $prediction;
    }
}
