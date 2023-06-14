<?php

namespace App\DrinkPrediction\Domain\Enum;

enum CharacterEnum
{
    case Kindness;
    case Empathy;
    case Patience;
    case Tolerance;
    case Determination;
    case OpenMindedness;
    case Reliability;
    case Respect;
    case Optimism;
    case Creativity;
    case Wisdom;
    case Charisma;
    case Altruism;
    case Independence;
    case Eccentricity;
    case Intuition;

    public static function getCharacter(string $character): self
    {
        return match ($character) {
            'kindness' => self::Kindness,
            'empathy' => self::Empathy,
            'patience' => self::Patience,
            'tolerance' => self::Tolerance,
            'determination' => self::Determination,
            'open-mindedness' => self::OpenMindedness,
            'reliability' => self::Reliability,
            'respect' => self::Respect,
            'optimism' => self::Optimism,
            'creativity' => self::Creativity,
            'wisdom' => self::Wisdom,
            'charisme' => self::Charisma,
            'altruism' => self::Altruism,
            'independence' => self::Independence,
            'eccentricity' => self::Eccentricity,
            'intuition' => self::Intuition,
        };
    }
}
