<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Predictor;

use App\DrinkPrediction\Domain\Enum\AgeRangeEnum;
use App\DrinkPrediction\Domain\Enum\BeerStyleEnum;
use App\DrinkPrediction\Domain\Enum\ForcePredictionEnum;
use App\DrinkPrediction\Domain\Enum\HairinessColorEnum;
use App\DrinkPrediction\Domain\Enum\SizeEnum;
use App\DrinkPrediction\Domain\Factory\DrinkerProfilFactory;
use App\DrinkPrediction\Domain\Factory\DrinkPredictionFactory;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveBlackHairiness;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveBlondHairiness;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveBrownHairiness;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveChestnutHairiness;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveExoticHairiness;
use App\DrinkPrediction\Domain\Specification\DoesProfileHaveGingerHairiness;
use App\DrinkPrediction\Domain\Specification\IsProfileAltruism;
use App\DrinkPrediction\Domain\Specification\IsProfileCharisma;
use App\DrinkPrediction\Domain\Specification\IsProfileContemplativeMusicLoverPersona;
use App\DrinkPrediction\Domain\Specification\IsProfileCreativity;
use App\DrinkPrediction\Domain\Specification\IsProfileDetermination;
use App\DrinkPrediction\Domain\Specification\IsProfileEccentricEpicureanPersona;
use App\DrinkPrediction\Domain\Specification\IsProfileEccentricity;
use App\DrinkPrediction\Domain\Specification\IsProfileEmpathy;
use App\DrinkPrediction\Domain\Specification\IsProfileExtremeAdventurerPersona;
use App\DrinkPrediction\Domain\Specification\IsProfileIndependence;
use App\DrinkPrediction\Domain\Specification\IsProfileIntuition;
use App\DrinkPrediction\Domain\Specification\IsProfileKindness;
use App\DrinkPrediction\Domain\Specification\IsProfileMedium;
use App\DrinkPrediction\Domain\Specification\IsProfileMiddleAged;
use App\DrinkPrediction\Domain\Specification\IsProfileOld;
use App\DrinkPrediction\Domain\Specification\IsProfileOptimism;
use App\DrinkPrediction\Domain\Specification\IsProfilePassionatePersona;
use App\DrinkPrediction\Domain\Specification\IsProfilePatience;
use App\DrinkPrediction\Domain\Specification\IsProfileReliability;
use App\DrinkPrediction\Domain\Specification\IsProfileRespect;
use App\DrinkPrediction\Domain\Specification\IsProfileSmall;
use App\DrinkPrediction\Domain\Specification\IsProfileSociableAndRelaxedSpiritPersona;
use App\DrinkPrediction\Domain\Specification\IsProfileTall;
use App\DrinkPrediction\Domain\Specification\IsProfileTolerance;
use App\DrinkPrediction\Domain\Specification\IsProfileVerySmall;
use App\DrinkPrediction\Domain\Specification\IsProfileVeryTall;
use App\DrinkPrediction\Domain\Specification\IsProfileWarmAndLaidBlackFriendPersona;
use App\DrinkPrediction\Domain\Specification\IsProfileWisdom;
use App\DrinkPrediction\Domain\Specification\IsProfileYoung;

class SpecificationPredictor implements PredicatorInterface
{
    public function __construct(
        private readonly DoesProfileHaveBlondHairiness $doesProfileHaveBlondHairiness,
        private readonly DoesProfileHaveChestnutHairiness $doesProfileHaveChestnutHairiness,
        private readonly DoesProfileHaveGingerHairiness $doesProfileHaveGingerHairiness,
        private readonly DoesProfileHaveBrownHairiness $doesProfileHaveBrownHairiness,
        private readonly DoesProfileHaveBlackHairiness $doesProfileHaveBlackHairiness,
        private readonly DoesProfileHaveExoticHairiness $doesProfileHaveExoticHairiness,
        private readonly IsProfileYoung $isProfileYoung,
        private readonly IsProfileMiddleAged $isProfileMiddleAged,
        private readonly IsProfileOld $isProfileOld,
        private readonly IsProfileVerySmall $isProfileVerySmall,
        private readonly IsProfileSmall $isProfileSmall,
        private readonly IsProfileMedium $isProfileMedium,
        private readonly IsProfileTall $isProfileTall,
        private readonly IsProfileVeryTall $isProfileVeryTall,
        private readonly IsProfileKindness $isProfileKindness,
        private readonly IsProfileEmpathy $isProfileEmpathy,
        private readonly IsProfilePatience $isProfilePatience,
        private readonly IsProfileTolerance $isProfileTolerance,
        private readonly IsProfileDetermination $isProfileDetermination,
        private readonly IsProfileOptimism $isProfileOptimism,
        private readonly IsProfileRespect $isProfileRespect,
        private readonly IsProfileReliability $isProfileReliability,
        private readonly IsProfileCreativity $isProfileCreativity,
        private readonly IsProfileCharisma $isProfileCharisma,
        private readonly IsProfileAltruism $isProfileAltruism,
        private readonly IsProfileIndependence $isProfileIndependence,
        private readonly IsProfileWisdom $isProfileWisdom,
        private readonly IsProfileEccentricity $isProfileEccentricity,
        private readonly IsProfileIntuition $isProfileIntuition,
        private readonly IsProfileExtremeAdventurerPersona $isProfileExtremeAdventurerPersona,
        private readonly IsProfileContemplativeMusicLoverPersona $isProfileContemplativeMusicLoverPersona,
        private readonly IsProfileWarmAndLaidBlackFriendPersona $isProfileWarmAndLaidBlackFriendPersona,
        private readonly IsProfileEccentricEpicureanPersona $isProfileEccentricEpicureanPersona,
        private readonly IsProfilePassionatePersona $isProfilePassionatePersona,
        private readonly IsProfileSociableAndRelaxedSpiritPersona $isProfileSociableAndRelaxedSpiritPersona
    ) {
    }

    public function predictDrink(
        AgeRangeEnum $age,
        HairinessColorEnum $hairinessColor,
        SizeEnum $size,
        array $characters,
        array $politicalOrientations,
        array $waysOfThinking
    ): DrinkPredictionInterface
    {
        $profile = DrinkerProfilFactory::createNew(
            $age,
            $hairinessColor,
            $size,
            $characters,
            $politicalOrientations,
            $waysOfThinking
        );

        $prediction = DrinkPredictionFactory::createNew();

        if ($this->doesProfileHaveBlondHairiness->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
        }

        if ($this->doesProfileHaveChestnutHairiness->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
        }

        if ($this->doesProfileHaveGingerHairiness->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
        }

        if ($this->doesProfileHaveBrownHairiness->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Little);
        }

        if ($this->doesProfileHaveBlackHairiness->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Little);
        }

        if ($this->doesProfileHaveExoticHairiness->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileYoung->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
        }

        if ($this->isProfileMiddleAged->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
        }

        if ($this->isProfileOld->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Little);
        }

        if ($this->isProfileVerySmall->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Little);
        }

        if ($this->isProfileSmall->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
        }

        if ($this->isProfileMedium->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
        }

        if ($this->isProfileTall->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
        }

        if ($this->isProfileVeryTall->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Little);
        }

        if ($this->isProfileKindness->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileEmpathy->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Medium);
        }

        if ($this->isProfilePatience->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileTolerance->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileDetermination->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileOptimism->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileRespect->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileReliability->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileCreativity->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileCharisma->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileAltruism->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileIndependence->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileWisdom->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileEccentricity->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileIntuition->isSatisfiedBy($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Medium);
        }

        if ($this->isProfileExtremeAdventurerPersona->isSatisfied($profile)) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Strong);
        }

        if ($this->isProfileContemplativeMusicLoverPersona->isSatisfied($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Strong);
        }

        if ($this->isProfileWarmAndLaidBlackFriendPersona->isSatisfied($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Strong);
        }

        if ($this->isProfileEccentricEpicureanPersona->isSatisfied($profile)) {
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Strong);
        }

        if ($this->isProfilePassionatePersona->isSatisfied($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Strong);
        }

        if ($this->isProfileSociableAndRelaxedSpiritPersona->isSatisfied($profile)) {
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Strong);
        }

        return $prediction;
    }
}
