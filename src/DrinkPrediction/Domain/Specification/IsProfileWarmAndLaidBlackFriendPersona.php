<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Specification;

use App\DrinkPrediction\Domain\Model\DrinkerProfileInterface;

class IsProfileWarmAndLaidBlackFriendPersona
{
    public function __construct(
        private readonly DoesProfileHaveBlackHairiness $doesProfileHaveBlackHairiness,
        private readonly DoesProfileHaveBrownHairiness $doesProfileHaveBrownHairiness,
        private readonly DoesProfileHaveBlondHairiness $doesProfileHaveBlondHairiness,
        private readonly DoesProfileHaveChestnutHairiness $doesProfileHaveChestnutHairiness,
        private readonly IsProfileYoung $isProfileYoung,
        private readonly IsProfileMiddleAged $isProfileMiddleAged,
        private readonly IsProfileSmall $isProfileSmall,
        private readonly IsProfileMedium $isProfileMedium,
        private readonly IsProfileKindness $isProfileKindness,
        private readonly IsProfileOptimism $isProfileOptimism
    ) {
    }

    public function isSatisfiedBy(DrinkerProfileInterface $drinkerProfile): bool
    {
        return
            $this->doesProfileHaveBlackHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->doesProfileHaveBrownHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->doesProfileHaveBlondHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->doesProfileHaveChestnutHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileYoung->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileMiddleAged->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileSmall->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileMedium->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileKindness->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileOptimism->isSatisfiedBy($drinkerProfile)
        ;
    }
}
