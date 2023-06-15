<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Application\Operation\Command;

use App\DrinkPrediction\Domain\Enum\AgeRangeEnum;
use App\DrinkPrediction\Domain\Enum\CorpulenceEnum;
use App\DrinkPrediction\Domain\Enum\HairinessColorEnum;
use App\DrinkPrediction\Domain\Enum\SizeEnum;
use App\Shared\Application\Command\CommandInterface;

final readonly class PredictDrinkCommand implements CommandInterface
{
    public function __construct(
        public AgeRangeEnum $age,
        public SizeEnum $size,
        public HairinessColorEnum $hairinessColor,
        public CorpulenceEnum $corpulence,
        public array $characters,
        public array $politicalOrientations,
        public array $wayOfThinkings,
    ) {
    }
}
