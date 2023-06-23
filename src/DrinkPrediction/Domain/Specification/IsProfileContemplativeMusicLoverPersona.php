<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Specification;

use App\DrinkPrediction\Domain\Model\DrinkerProfileInterface;

class IsProfileContemplativeMusicLoverPersona
{
    public function __construct(
        private readonly DoesProfileHaveBlackHairiness $doesProfileHaveBlackHairiness,
        private readonly DoesProfileHaveBrownHairiness $doesProfileHaveBrownHairiness,
        private readonly DoesProfileHaveBlondHairiness $doesProfileHaveBlondHairiness,
        private readonly IsProfileYoung $isProfileYoung,
        private readonly IsProfileMiddleAged $isProfileMiddleAged,
        private readonly IsProfileMedium $isProfileMedium,
        private readonly IsProfileTall $isProfileTall,
        private readonly IsProfileEmpathy $isProfileEmpathy,
        private readonly IsProfileCreativity $isProfileCreativity
    ) {
    }

    public function isSatisfied(DrinkerProfileInterface $drinkerProfile): bool
    {
        return
            $this->doesProfileHaveBlackHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->doesProfileHaveBrownHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->doesProfileHaveBlondHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileYoung->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileMiddleAged->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileMedium->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileTall->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileEmpathy->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileCreativity->isSatisfiedBy($drinkerProfile)
        ;
    }
}
