<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Enum;

enum WayOfThinkingEnum
{
    case Rationalism;
    case Empiricism;
    case Positivism;
    case Existentialism;
    case Humanism;
    case Structuralism;
    case Postmodernism;
    case Feminism;
    case Constructivism;
    case Pragmatism;
    case Primitivism;
    case Transcendentalism;
    case Nihilism;
    case Epicureanism;
    case Dadaism;
    case Objectivism;
    case Zen;
    case Situationism;
    case Solipsism;
    case Cynicism;

    public static function getWayOfThinking(string $wayOfThinking): self
    {
        return match ($wayOfThinking) {
            'rationalism' => self::Rationalism,
            'empiricism' => self::Empiricism,
            'positivism' => self::Positivism,
            'existentialism' => self::Existentialism,
            'humanism' => self::Humanism,
            'structuralism' => self::Structuralism,
            'postmodernism' => self::Postmodernism,
            'feminism' => self::Feminism,
            'constructivism' => self::Constructivism,
            'pragmatism' => self::Pragmatism,
            'primitivism' => self::Primitivism,
            'transcendentalism' => self::Transcendentalism,
            'nihilism' => self::Nihilism,
            'epicureanism' => self::Epicureanism,
            'dadaism' => self::Dadaism,
            'objectivism' => self::Objectivism,
            'zen' => self::Zen,
            'situationism' => self::Situationism,
            'solipsism' => self::Solipsism,
            'cynism' => self::Cynicism,
        };
    }
}
