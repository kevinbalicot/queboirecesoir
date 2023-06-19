<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Specification;

use App\DrinkPrediction\Domain\Enum\AgeRangeEnum;
use App\DrinkPrediction\Domain\Model\DrinkerProfileInterface;

class IsProfileMiddleAged
{
    public function isSatisfiedBy(DrinkerProfileInterface $drinkerProfile): bool
    {
        return AgeRangeEnum::MiddleAged === $drinkerProfile->getAgeRange();
    }
}
