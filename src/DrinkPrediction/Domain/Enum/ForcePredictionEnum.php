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
        match ($forcePrediction) {
            self::Little => $force = 1,
            self::Medium => $force = 3,
            self::Strong => $force = 5,
        };

        return $force;
    }
}
