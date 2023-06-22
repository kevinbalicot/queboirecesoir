<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Application\RuleEngine;

use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;
use App\Shared\Application\Rule\AbstractRuleEngine;

class PredictDrinkRuleEngine extends AbstractRuleEngine implements PredictDrinkRuleEngineInterface
{
    public function supports(mixed $subject): bool
    {
        return $subject instanceof DrinkPredictionInterface;
    }

    public function getName(): string
    {
        return 'app.predict_drink.rule_engine';
    }

    public function getDescription(): string
    {
        return 'Predict drink for drinker profil depends rules';
    }
}
