<?php

namespace App\DrinkPrediction\Domain\Enum;

enum SizeEnum
{
    case VerySmall;
    case Small;
    case Medium;
    case Tall;
    case VeryTall;

    public static function getSize(int $size): self
    {
        if ($size <= 140) {
            return self::VerySmall;
        } else if ($size <= 160) {
            return self::Small;
        } else if ($size <= 180) {
            return self::Medium;
        } else if ($size <= 200) {
            return self::Tall;
        }

        return self::VeryTall;
    }
}
