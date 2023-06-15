<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Enum;

enum ForcePredictionEnum
{
    case Little;
    case Medium;
    case Strong;

    public static function getForce(self $forcePrediction): int
    {
        return match ($forcePrediction) {
            self::Little => 1,
            self::Medium => 3,
            self::Strong => 5,
        };
    }
}
