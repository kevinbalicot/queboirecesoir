<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Specification;

use App\DrinkPrediction\Domain\Model\DrinkerProfileInterface;

class IsProfileExtremeAdventurerPersona
{
    public function __construct(
        private readonly DoesProfileHaveBrownHairiness $doesBrownHairiness,
        private readonly DoesProfileHaveChestnutHairiness $doesChestnutHairiness,
        private readonly IsProfileYoung $isProfileYoung,
        private readonly IsProfileMedium $isProfileMedium,
        private readonly IsProfileTall $isProfileTall,
        private readonly IsProfileIndependence $isProfileIndependence,
        private readonly IsProfileDetermination $isProfileDetermination
    ) {
    }

    public function isSatisfied(DrinkerProfileInterface $drinkerProfile): bool
    {
        return
            $this->doesBrownHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->doesChestnutHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileYoung->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileMedium->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileTall->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileIndependence->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileDetermination->isSatisfiedBy($drinkerProfile)
        ;
    }
}
