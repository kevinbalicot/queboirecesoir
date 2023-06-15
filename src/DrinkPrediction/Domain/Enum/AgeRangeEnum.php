<?php

namespace App\DrinkPrediction\Domain\Enum;

enum AgeRangeEnum
{
    case Young;
    case MiddleAged;
    case Old;

    public static function getAgeRange(\DateTime $birthday): self
    {
        $now = new \DateTime();
        $years = $now->diff($birthday)->y;

        if ($years <= 40) {
            return self::Young;
        } else if ($years <= 60) {
            return self::MiddleAged;
        }

        return self::Old;
    }
}
