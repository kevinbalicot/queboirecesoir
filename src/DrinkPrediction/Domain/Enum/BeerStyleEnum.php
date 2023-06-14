<?php

namespace App\DrinkPrediction\Domain\Enum;

enum BeerStyleEnum
{
    case IPA;
    case Stout;
    case Pilsner;
    case BelgianStrongAle;
    case Saison;
    case Weizenbier;

    public static function getDescription(BeerStyleEnum $style): string
    {
        return match ($style) {
            self::IPA => "L'IPA est un style de bière qui se distingue par son amertume et ses arômes de houblon prononcés. Les IPA peuvent être plus légères et fruitées (IPA américaine) ou plus maltées et terreuses (IPA anglaise).",
            self::Stout => "Les stouts sont des bières noires et épaisses, souvent associées à des saveurs de café, de chocolat et de torréfaction. Ils ont généralement une teneur en alcool plus élevée et une texture veloutée.",
            self::Pilsner => "Les pilsners sont des lagers claires et légères, originaires de la République tchèque. Elles se distinguent par leur arôme subtil de houblon, leur amertume modérée et leur finition nette et croustillante.",
            self::BelgianStrongAle => "Ces bières belges fortes et complexes ont généralement une teneur en alcool élevée et des saveurs riches de fruits, d'épices et de levure belge distinctive.",
            self::Saison => "Originaire de la Belgique, la bière de saison est traditionnellement une bière fermière brassée pendant les mois d'hiver pour être consommée pendant l'été. Elle est souvent épicée, légèrement acide et rafraîchissante.",
            self::Weizenbier => "Ce style de bière allemande est brassé avec une grande proportion de malt de blé, ce qui lui confère un corps plein et une saveur de banane et de clou de girofle provenant de la levure utilisée.",
        };
    }

    public static function getName(BeerStyleEnum $style): string
    {
        return match ($style) {
            self::IPA => "IPA",
            self::Stout => "Stout",
            self::Pilsner => "Pilsner",
            self::BelgianStrongAle => "Belgian Strong Ale",
            self::Saison => "Saison",
            self::Weizenbier => "Weizenbier",
        };
    }

    public static function getStyles(): array
    {
        return [
            self::IPA,
            self::Stout,
            self::Pilsner,
            self::BelgianStrongAle,
            self::Saison,
            self::Weizenbier,
        ];
    }
}
