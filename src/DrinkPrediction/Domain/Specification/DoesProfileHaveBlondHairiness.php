<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Specification;

use App\DrinkPrediction\Domain\Enum\HairinessColorEnum;
use App\DrinkPrediction\Domain\Model\DrinkerProfileInterface;

class DoesProfileHaveBlondHairiness
{
    public function isSatisfiedBy(DrinkerProfileInterface $drinkerProfile): bool
    {
        return HairinessColorEnum::Blonde === $drinkerProfile->getHairinessColor();
    }
}
