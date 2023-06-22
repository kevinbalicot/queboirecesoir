<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Application\RuleEngine\Rule;

use App\DrinkPrediction\Domain\Enum\BeerStyleEnum;
use App\DrinkPrediction\Domain\Enum\ForcePredictionEnum;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveBlackHairiness;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveBrownHairiness;
use App\DrinkPrediction\Domain\Specification\IsProfileYoung;
use App\Shared\Application\Rule\RuleInterface;

class WhenProfilIsYoung implements DrinkPredictionRuleInterface
{
    public function __construct(
        private readonly IsProfileYoung $isProfileYoung
    ) {
    }

    /**
     * @param DrinkPredictionInterface $subject
     */
    public function when($subject): bool
    {
        return $this->isProfileYoung->isSatisfiedBy($subject->getProfile());
    }

    /**
     * @param DrinkPredictionInterface $subject
     */
    public function then($subject): void
    {
        $subject->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Little);
        $subject->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Little);
        $subject->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
        $subject->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
    }

    public function getDescription(): string
    {
        return 'When drinker profil is young';
    }
}
