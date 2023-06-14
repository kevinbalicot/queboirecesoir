<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Application\Operation\Command;

use App\DrinkPrediction\Domain\Enum\CorpulenceEnum;
use App\DrinkPrediction\Domain\Enum\HairinessColorEnum;
use App\Shared\Application\Command\CommandInterface;

final class PredictDrinkCommand implements CommandInterface
{
    public function __construct(
        public readonly \DateTime $birthDay,
        public readonly int $size,
        public readonly HairinessColorEnum $hairinessColor,
        public readonly CorpulenceEnum $corpulence,
        public readonly array $characters,
        public readonly array $politicalOrientations,
        public readonly array $wayOfThinkings,
    ) {
    }
}
