<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Specification;

use App\DrinkPrediction\Domain\Enum\AgeRangeEnum;
use App\DrinkPrediction\Domain\Enum\SizeEnum;
use App\DrinkPrediction\Domain\Model\DrinkerProfileInterface;

class IsProfileVeryTall
{
    public function isSatisfiedBy(DrinkerProfileInterface $drinkerProfile): bool
    {
        return SizeEnum::VeryTall === $drinkerProfile->getSize();
    }
}
