<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Enum;

enum CorpulenceEnum
{
    case Slim;
    case Average;
    case Athletic;
    case Overweight;
    case Obese;
    case Slender;
    case Muscular;
    case Endomorph;
    case Mesomorph;
    case Ectomorph;
    case ShortStature;
    case Tall;

    case Other;

    public static function getCorpulence(string $corpulence): self
    {
        return match ($corpulence) {
            'slim' => self::Slim,
            'average' => self::Average,
            'athletic' => self::Athletic,
            'overweight' => self::Overweight,
            'obese' => self::Obese,
            'slender' => self::Slender,
            'muscular' => self::Muscular,
            'Endomorph' => self::Endomorph,
            'Ectomorph' => self::Ectomorph,
            'ShortStature' => self::ShortStature,
            'tall' => self::Tall,
            default => self::Other,
        };
    }
}
