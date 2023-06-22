<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Application\RuleEngine\Rule;

use App\DrinkPrediction\Domain\Enum\BeerStyleEnum;
use App\DrinkPrediction\Domain\Enum\ForcePredictionEnum;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveBrownHairiness;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveChestnutHairiness;
use App\Shared\Application\Rule\RuleInterface;

class WhenProfilHaveChestnutHairiness implements DrinkPredictionRuleInterface
{
    public function __construct(
        private readonly DoesProfileHaveChestnutHairiness $doesProfileHaveChestnutHairiness
    ) {
    }

    /**
     * @param DrinkPredictionInterface $subject
     */
    public function when($subject): bool
    {
        return $this->doesProfileHaveChestnutHairiness->isSatisfiedBy($subject->getProfile());
    }

    /**
     * @param DrinkPredictionInterface $subject
     */
    public function then($subject): void
    {
        $subject->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Little);
        $subject->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
        $subject->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
    }
}
