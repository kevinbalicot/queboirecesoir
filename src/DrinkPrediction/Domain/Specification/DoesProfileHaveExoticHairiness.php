<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Specification;

use App\DrinkPrediction\Domain\Enum\HairinessColorEnum;
use App\DrinkPrediction\Domain\Model\DrinkerProfileInterface;

class DoesProfileHaveExoticHairiness
{
    public function __construct(
        private readonly DoesProfileHaveBlueHairiness $blueHairiness,
        private readonly DoesProfileHaveGreenHairiness $greenHairiness,
        private readonly DoesProfileHaveOrangeHairiness $orangeHairiness,
        private readonly DoesProfileHavePinkHairiness $pinkHairiness,
        private readonly DoesProfileHaveRainbowHairiness $rainbowHairiness,
    ){
    }

    public function isSatisfiedBy(DrinkerProfileInterface $drinkerProfile): bool
    {
        return
            $this->blueHairiness->isSatisfiedBy($drinkerProfile) ||
            $this->greenHairiness->isSatisfiedBy($drinkerProfile) ||
            $this->orangeHairiness->isSatisfiedBy($drinkerProfile) ||
            $this->pinkHairiness->isSatisfiedBy($drinkerProfile) ||
            $this->rainbowHairiness->isSatisfiedBy($drinkerProfile)
        ;
    }
}
