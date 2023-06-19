<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Specification;

use App\DrinkPrediction\Domain\Enum\HairinessColorEnum;
use App\DrinkPrediction\Domain\Model\DrinkerProfileInterface;

class DoesProfileHaveChestnutHairiness
{
    public function isSatisfiedBy(DrinkerProfileInterface $drinkerProfile): bool
    {
        return HairinessColorEnum::Chestnut === $drinkerProfile->getHairinessColor();
    }
}
