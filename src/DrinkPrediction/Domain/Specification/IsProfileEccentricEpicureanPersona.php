<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Specification;

use App\DrinkPrediction\Domain\Model\DrinkerProfileInterface;

class IsProfileEccentricEpicureanPersona
{
    public function __construct(
        private readonly DoesProfileHaveBlackHairiness $doesProfileHaveBlackHairiness,
        private readonly DoesProfileHaveBrownHairiness $doesProfileHaveBrownHairiness,
        private readonly DoesProfileHaveBlondHairiness $doesProfileHaveBlondHairiness,
        private readonly DoesProfileHaveChestnutHairiness $doesProfileHaveChestnutHairiness,
        private readonly IsProfileMiddleAged $isProfileMiddleAged,
        private readonly IsProfileOld $isProfileOld,
        private readonly IsProfileVerySmall $isProfileVerySmall,
        private readonly IsProfileSmall $isProfileSmall,
        private readonly IsProfileMedium $isProfileMedium,
        private readonly IsProfileEccentricity $isProfileEccentricity,
        private readonly IsProfileTolerance $isProfileTolerance
    ) {
    }

    public function isSatisfied(DrinkerProfileInterface $drinkerProfile): bool
    {
        return
            $this->doesProfileHaveBlackHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->doesProfileHaveBrownHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->doesProfileHaveBlondHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->doesProfileHaveChestnutHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileMiddleAged->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileOld->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileVerySmall->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileSmall->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileMedium->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileEccentricity->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileTolerance->isSatisfiedBy($drinkerProfile)
        ;
    }
}
