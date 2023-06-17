<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Enum;

enum HairinessColorEnum
{
    case Black;
    case Brown;
    case Chestnut;
    case Blonde;
    case Roux;
    case Blue;
    case Green;
    case Orange;
    case Pink;
    case Rainbow;
    case Other;

    public static function getHairinessColor(string $hairinessColor): self
    {
        return match ($hairinessColor) {
            'black' => self::Black,
            'brown' => self::Brown,
            'chestnut' => self::Chestnut,
            'blonde' => self::Blonde,
            'ginger' => self::Roux,
            'blue' => self::Blue,
            'green' => self::Green,
            'orange' => self::Orange,
            'pink' => self::Pink,
            'rainbow' => self::Rainbow,
            default => self::Other,
        };
    }
}
