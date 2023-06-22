<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Application\RuleEngine\Rule;

use App\DrinkPrediction\Domain\Enum\BeerStyleEnum;
use App\DrinkPrediction\Domain\Enum\ForcePredictionEnum;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveBrownHairiness;
use App\Shared\Application\Rule\RuleInterface;

class WhenProfilHaveBrownHairiness implements DrinkPredictionRuleInterface
{
    public function __construct(
        private readonly DoesProfileHaveBrownHairiness $doesProfileHaveBrownHairiness
    ) {
    }

    /**
     * @param DrinkPredictionInterface $subject
     */
    public function when($subject): bool
    {
        return $this->doesProfileHaveBrownHairiness->isSatisfiedBy($subject->getProfile());
    }

    /**
     * @param DrinkPredictionInterface $subject
     */
    public function then($subject): void
    {
        $subject->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Little);
        $subject->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Little);
    }

    public function getDescription(): string
    {
        return 'When drinker profil have brown hairiness';
    }
}
