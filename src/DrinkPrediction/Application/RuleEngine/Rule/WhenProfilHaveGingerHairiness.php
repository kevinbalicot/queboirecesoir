<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Application\RuleEngine\Rule;

use App\DrinkPrediction\Domain\Enum\BeerStyleEnum;
use App\DrinkPrediction\Domain\Enum\ForcePredictionEnum;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveBrownHairiness;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveGingerHairiness;
use App\Shared\Application\Rule\RuleInterface;

class WhenProfilHaveGingerHairiness implements DrinkPredictionRuleInterface
{
    public function __construct(
        private readonly DoesProfileHaveGingerHairiness $doesProfileHaveGingerHairiness
    ) {
    }

    /**
     * @param DrinkPredictionInterface $subject
     */
    public function when($subject): bool
    {
        return $this->doesProfileHaveGingerHairiness->isSatisfiedBy($subject->getProfile());
    }

    /**
     * @param DrinkPredictionInterface $subject
     */
    public function then($subject): void
    {
        $subject->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Little);
        $subject->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
    }

    public function getDescription(): string
    {
        return 'When drinker profil have ginger hairiness';
    }
}
