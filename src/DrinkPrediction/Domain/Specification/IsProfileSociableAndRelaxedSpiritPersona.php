<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Specification;

use App\DrinkPrediction\Domain\Model\DrinkerProfileInterface;

class IsProfileSociableAndRelaxedSpiritPersona
{
    public function __construct(
        private readonly DoesProfileHaveBlondHairiness $doesProfileHaveBlondHairiness,
        private readonly DoesProfileHaveBrownHairiness $doesProfileHaveBrownHairiness,
        private readonly DoesProfileHavePinkHairiness $doesProfileHavePinkHairiness,
        private readonly DoesProfileHaveRainbowHairiness $doesProfileHaveRainbowHairiness,
        private readonly IsProfileYoung $isProfileYoung,
        private readonly IsProfileMiddleAged $isProfileMiddleAged,
        private readonly IsProfileSmall $isProfileSmall,
        private readonly IsProfileMedium $isProfileMedium,
        private readonly IsProfileVeryTall $isProfileVeryTall,
        private readonly IsProfileOpenMindedness $isProfileOpenMindedness,
        private readonly IsProfileCharisma $isProfileCharisma
    ) {
    }

    public function isSatisfiedBy(DrinkerProfileInterface $drinkerProfile): bool
    {
        return
            $this->doesProfileHaveBlondHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->doesProfileHaveBrownHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->doesProfileHavePinkHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->doesProfileHaveRainbowHairiness->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileYoung->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileMiddleAged->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileSmall->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileMedium->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileVeryTall->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileOpenMindedness->isSatisfiedBy($drinkerProfile) &&
            $this->isProfileCharisma->isSatisfiedBy($drinkerProfile)
        ;
    }
}
