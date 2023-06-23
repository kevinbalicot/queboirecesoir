<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Specification;

use App\DrinkPrediction\Domain\Enum\HairinessColorEnum;
use App\DrinkPrediction\Domain\Model\DrinkerProfileInterface;

class DoesProfileHaveGreenHairiness
{
    public function isSatisfiedBy(DrinkerProfileInterface $drinkerProfile): bool
    {
        return HairinessColorEnum::Green === $drinkerProfile->getHairinessColor();
    }
}
