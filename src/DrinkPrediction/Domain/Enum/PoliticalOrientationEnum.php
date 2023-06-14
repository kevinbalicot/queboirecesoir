<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Enum;

enum PoliticalOrientationEnum
{
    case Right;
    case Left;
    case Conservatism;
    case Socialism;
    case SocialDemocracy;
    case Nationalism;
    case Populism;
    case Environmentalism;
    case Libertarianism;
    case Centrism;
    case Anarchism;
    case AnarchoSyndicalism;
    case LibertarianCommunism;
    case Communism;
    case IntersectionalFeminism;
    case NeoLiberalism;
    case Technocracy;
    case Ecocentrism;
    case Transhumanism;
    case Regionalism;
    case Utopianism;

    public static function getPoliticalOrientation(string $politicalOrientation): self
    {
        return match ($politicalOrientation) {
            'right' => self::Right,
            'left' => self::Left,
            'conservatism' => self::Conservatism,
            'socialism' => self::Socialism,
            'social-democracy' => self::SocialDemocracy,
            'nationalism' => self::Nationalism,
            'populism' => self::Populism,
            'environmentalism' => self::Environmentalism,
            'libertarianism' => self::Libertarianism,
            'centrism' => self::Centrism,
            'anarchism' => self::Anarchism,
            'anarcho-syndicalism' => self::AnarchoSyndicalism,
            'libertarian-communism' => self::LibertarianCommunism,
            'communism' => self::Communism,
            'intersectional-feminism' => self::IntersectionalFeminism,
            'neo-liberalism' => self::NeoLiberalism,
            'technocracy' => self::Technocracy,
            'ecocentrism' => self::Ecocentrism,
            'transhumanism' => self::Transhumanism,
            'regionalism' => self::Regionalism,
            'utopism' => self::Utopianism,
        };
    }
}
