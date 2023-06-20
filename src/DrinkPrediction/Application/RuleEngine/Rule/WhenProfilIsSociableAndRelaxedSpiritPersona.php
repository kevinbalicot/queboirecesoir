<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Application\RuleEngine\Rule;

use App\DrinkPrediction\Domain\Enum\BeerStyleEnum;
use App\DrinkPrediction\Domain\Enum\ForcePredictionEnum;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveBlackHairiness;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveBrownHairiness;
use App\DrinkPrediction\Domain\Specification\IsProfileEmpathy;
use App\DrinkPrediction\Domain\Specification\IsProfileExtremeAdventurerPersona;
use App\DrinkPrediction\Domain\Specification\IsProfileKindness;
use App\DrinkPrediction\Domain\Specification\IsProfileOptimism;
use App\DrinkPrediction\Domain\Specification\IsProfileSociableAndRelaxedSpiritPersona;
use App\DrinkPrediction\Domain\Specification\IsProfileYoung;
use App\Shared\Application\Rule\RuleInterface;

class WhenProfilIsSociableAndRelaxedSpiritPersona implements DrinkPredictionRuleInterface
{
    public function __construct(
        private readonly IsProfileSociableAndRelaxedSpiritPersona $isProfileSociableAndRelaxedSpiritPersona
    ) {
    }

    /**
     * @param DrinkPredictionInterface $subject
     */
    public function when($subject): bool
    {
        return $this->isProfileSociableAndRelaxedSpiritPersona->isSatisfiedBy($subject->getProfile());
    }

    /**
     * @param DrinkPredictionInterface $subject
     */
    public function then($subject): void
    {
        $subject->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Strong);
    }
}
