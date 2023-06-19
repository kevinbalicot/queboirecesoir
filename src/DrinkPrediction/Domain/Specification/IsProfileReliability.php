<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Specification;

use App\DrinkPrediction\Domain\Enum\AgeRangeEnum;
use App\DrinkPrediction\Domain\Enum\CharacterEnum;
use App\DrinkPrediction\Domain\Model\DrinkerProfileInterface;

class IsProfileReliability
{
    public function isSatisfiedBy(DrinkerProfileInterface $drinkerProfile): bool
    {
        return in_array(CharacterEnum::Reliability, $drinkerProfile->getCharacters());
    }
}
