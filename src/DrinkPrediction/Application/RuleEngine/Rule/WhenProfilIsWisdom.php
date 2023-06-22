<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Application\RuleEngine\Rule;

use App\DrinkPrediction\Domain\Enum\BeerStyleEnum;
use App\DrinkPrediction\Domain\Enum\ForcePredictionEnum;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveBlackHairiness;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveBrownHairiness;
use App\DrinkPrediction\Domain\Specification\IsProfileEmpathy;
use App\DrinkPrediction\Domain\Specification\IsProfileKindness;
use App\DrinkPrediction\Domain\Specification\IsProfileWisdom;
use App\DrinkPrediction\Domain\Specification\IsProfileYoung;
use App\Shared\Application\Rule\RuleInterface;

class WhenProfilIsWisdom implements DrinkPredictionRuleInterface
{
    public function __construct(
        private readonly IsProfileWisdom $isProfileWisdom
    ) {
    }

    /**
     * @param DrinkPredictionInterface $subject
     */
    public function when($subject): bool
    {
        return $this->isProfileWisdom->isSatisfiedBy($subject->getProfile());
    }

    /**
     * @param DrinkPredictionInterface $subject
     */
    public function then($subject): void
    {
        $subject->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Medium);
    }

    public function getDescription(): string
    {
        return 'When drinker profil is wisdom';
    }
}
