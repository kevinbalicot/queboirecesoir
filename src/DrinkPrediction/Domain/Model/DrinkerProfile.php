<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Model;

use App\DrinkPrediction\Domain\Enum\AgeRangeEnum;
use App\DrinkPrediction\Domain\Enum\HairinessColorEnum;
use App\DrinkPrediction\Domain\Enum\SizeEnum;

readonly class DrinkerProfile implements DrinkerProfileInterface
{
    public function __construct(
        private AgeRangeEnum $ageRange,
        private HairinessColorEnum $hairinessColor,
        private SizeEnum $size,
        private array $characters,
        private array $politicalOrientations,
        private array $waysOfThinking
    ) {
    }

    public function getAgeRange(): AgeRangeEnum
    {
        return $this->ageRange;
    }

    public function getHairinessColor(): HairinessColorEnum
    {
        return $this->hairinessColor;
    }

    public function getSize(): SizeEnum
    {
        return $this->size;
    }

    public function getCharacters(): array
    {
        return $this->characters;
    }

    public function getPoliticalOrientations(): array
    {
        return $this->politicalOrientations;
    }

    public function getWaysOfThinking(): array
    {
        return $this->waysOfThinking;
    }
}
