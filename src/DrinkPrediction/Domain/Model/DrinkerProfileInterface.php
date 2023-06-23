<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Model;

use App\DrinkPrediction\Domain\Enum\AgeRangeEnum;
use App\DrinkPrediction\Domain\Enum\HairinessColorEnum;
use App\DrinkPrediction\Domain\Enum\SizeEnum;

interface DrinkerProfileInterface
{
    public function getAgeRange(): AgeRangeEnum;

    public function getHairinessColor(): HairinessColorEnum;

    public function getSize(): SizeEnum;

    public function getCharacters(): array;

    public function getPoliticalOrientations(): array;

    public function getWaysOfThinking(): array;
}
