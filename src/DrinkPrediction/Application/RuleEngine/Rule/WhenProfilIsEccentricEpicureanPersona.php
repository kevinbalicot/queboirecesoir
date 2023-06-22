<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Application\RuleEngine\Rule;

use App\DrinkPrediction\Domain\Enum\BeerStyleEnum;
use App\DrinkPrediction\Domain\Enum\ForcePredictionEnum;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveBlackHairiness;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveBrownHairiness;
use App\DrinkPrediction\Domain\Specification\IsProfileEccentricEpicureanPersona;
use App\DrinkPrediction\Domain\Specification\IsProfileEmpathy;
use App\DrinkPrediction\Domain\Specification\IsProfileExtremeAdventurerPersona;
use App\DrinkPrediction\Domain\Specification\IsProfileKindness;
use App\DrinkPrediction\Domain\Specification\IsProfileOptimism;
use App\DrinkPrediction\Domain\Specification\IsProfileYoung;
use App\Shared\Application\Rule\RuleInterface;

class WhenProfilIsEccentricEpicureanPersona implements DrinkPredictionRuleInterface
{
    public function __construct(
        private readonly IsProfileEccentricEpicureanPersona $isProfileEccentricEpicureanPersona
    ) {
    }

    /**
     * @param DrinkPredictionInterface $subject
     */
    public function when($subject): bool
    {
        return $this->isProfileEccentricEpicureanPersona->isSatisfiedBy($subject->getProfile());
    }

    /**
     * @param DrinkPredictionInterface $subject
     */
    public function then($subject): void
    {
        $subject->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Strong);
    }
}
