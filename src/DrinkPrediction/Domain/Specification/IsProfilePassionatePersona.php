<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Specification;

use App\DrinkPrediction\Domain\Model\DrinkerProfileInterface;

class IsProfilePassionatePersona
{
    public function __construct(
        private readonly DoesProfileHaveExoticHairiness $doesProfileHaveExoticHairiness,
        private readonly IsProfileYoung $isProfileYoung,
        private readonly IsProfileMiddleAged $isProfileMiddleAged,
        private readonly IsProfileVerySmall $isProfileVerySmall,
        private readonly IsProfileSmall $isProfileSmall,
        private readonly IsProfileMedium $isProfileMedium,
        private readonly IsProfileOptimism $isProfileOptimism,
        private readonly IsProfileRespect $isProfileRespect
    ) {
    }

    public function isSatisfiedBy(DrinkerProfileInterface $drinkerProfile): bool
    {
        return
            $this->doesProfileHaveExoticHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileYoung->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileMiddleAged->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileVerySmall->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileSmall->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileMedium->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileOptimism->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileRespect->isSatisfiedBy($drinkerProfile)
        ;
    }
}
