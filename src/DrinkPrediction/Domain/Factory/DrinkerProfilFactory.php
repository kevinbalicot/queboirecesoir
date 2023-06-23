<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Factory;

use App\DrinkPrediction\Domain\Enum\AgeRangeEnum;
use App\DrinkPrediction\Domain\Enum\HairinessColorEnum;
use App\DrinkPrediction\Domain\Enum\SizeEnum;
use App\DrinkPrediction\Domain\Model\DrinkerProfile;
use App\DrinkPrediction\Domain\Model\DrinkerProfileInterface;

class DrinkerProfilFactory
{
    public static function createNew(
        AgeRangeEnum $ageRange,
        HairinessColorEnum $hairinessColor,
        SizeEnum $size,
        array $characters,
        array $politicalOrientations,
        array $waysOfThinking
    ): DrinkerProfileInterface
    {
        return new DrinkerProfile(
            $ageRange,
            $hairinessColor,
            $size,
            $characters,
            $politicalOrientations,
            $waysOfThinking
        );
    }
}
