<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Domain\Predictor;

use App\DrinkPrediction\Domain\Enum\AgeRangeEnum;
use App\DrinkPrediction\Domain\Enum\BeerStyleEnum;
use App\DrinkPrediction\Domain\Enum\CharacterEnum;
use App\DrinkPrediction\Domain\Enum\ForcePredictionEnum;
use App\DrinkPrediction\Domain\Enum\HairinessColorEnum;
use App\DrinkPrediction\Domain\Enum\SizeEnum;
use App\DrinkPrediction\Domain\Factory\DrinkPredictionFactory;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;

class IfPredicator
{
    public function predictDrink(
        AgeRangeEnum $age,
        HairinessColorEnum $hairinessColor,
        SizeEnum $size,
        array $characters,
        array $politicalOrientations,
        array $waysOfThinking
    ): DrinkPredictionInterface
    {
        $prediction = DrinkPredictionFactory::createNew();

        if (HairinessColorEnum::Blonde === $hairinessColor) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
        }

        if (HairinessColorEnum::Chestnut === $hairinessColor) {
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
        }

        if (HairinessColorEnum::Ginger === $hairinessColor) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
        }

        if (HairinessColorEnum::Brown === $hairinessColor) {
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Little);
        }

        if (HairinessColorEnum::Black === $hairinessColor) {
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Little);
        }

        if (
            HairinessColorEnum::Blue === $hairinessColor ||
            HairinessColorEnum::Green === $hairinessColor ||
            HairinessColorEnum::Orange === $hairinessColor ||
            HairinessColorEnum::Pink === $hairinessColor ||
            HairinessColorEnum::Rainbow === $hairinessColor
        ) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Medium);
        }

        if (AgeRangeEnum::Young === $age) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
        }

        if (AgeRangeEnum::MiddleAged === $age) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
        }

        if (AgeRangeEnum::Old === $age) {
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Little);
        }

        if (SizeEnum::VerySmall === $size) {
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Little);
        }

        if (SizeEnum::Small === $size) {
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
        }

        if (SizeEnum::Medium === $size) {
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
        }

        if (SizeEnum::Tall === $size) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Little);
        }

        if (SizeEnum::VeryTall === $size) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Little);
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Little);
        }

        if (in_array(CharacterEnum::Kindness, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Medium);
        }

        if (in_array(CharacterEnum::Empathy, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Medium);
        }

        if (in_array(CharacterEnum::Patience, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Medium);
        }

        if (in_array(CharacterEnum::Tolerance, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Medium);
        }

        if (in_array(CharacterEnum::Determination, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Medium);
        }

        if (in_array(CharacterEnum::Optimism, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Medium);
        }

        if (in_array(CharacterEnum::Respect, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Medium);
        }

        if (in_array(CharacterEnum::Reliability, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Medium);
        }

        if (in_array(CharacterEnum::Creativity, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Medium);
        }

        if (in_array(CharacterEnum::Charisma, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Medium);
        }

        if (in_array(CharacterEnum::Altruism, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Medium);
        }

        if (in_array(CharacterEnum::Independence, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Medium);
        }

        if (in_array(CharacterEnum::Wisdom, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Medium);
        }

        if (in_array(CharacterEnum::Eccentricity, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Medium);
        }

        if (in_array(CharacterEnum::Intuition, $characters)) {
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Medium);
        }

        // extreme adventurer
        if (
            (HairinessColorEnum::Brown || HairinessColorEnum::Chestnut) &&
            AgeRangeEnum::Young === $age &&
            (SizeEnum::Medium === $size || SizeEnum::Tall === $size) &&
            (in_array(CharacterEnum::Independence, $characters) || in_array(CharacterEnum::Determination, $characters))
        ) {
            $prediction->predictDrink(BeerStyleEnum::IPA, ForcePredictionEnum::Strong);
        }

        // contemplative music lover
        if (
            (HairinessColorEnum::Black || HairinessColorEnum::Brown || HairinessColorEnum::Blonde) &&
            (AgeRangeEnum::Young === $age || AgeRangeEnum::MiddleAged) &&
            (SizeEnum::Medium === $size || SizeEnum::Tall === $size) &&
            (in_array(CharacterEnum::Empathy, $characters) || in_array(CharacterEnum::Creativity, $characters))
        ) {
            $prediction->predictDrink(BeerStyleEnum::Stout, ForcePredictionEnum::Strong);
        }

        // warm and laid back friend
        if (
            (HairinessColorEnum::Black || HairinessColorEnum::Brown || HairinessColorEnum::Blonde || HairinessColorEnum::Chestnut) &&
            (AgeRangeEnum::Young === $age || AgeRangeEnum::MiddleAged) &&
            (SizeEnum::Small === $size || SizeEnum::Medium === $size) &&
            (in_array(CharacterEnum::Kindness, $characters) || in_array(CharacterEnum::Optimism, $characters))
        ) {
            $prediction->predictDrink(BeerStyleEnum::Pilsner, ForcePredictionEnum::Strong);
        }

        // eccentric epicurean
        if (
            (HairinessColorEnum::Black || HairinessColorEnum::Brown || HairinessColorEnum::Blonde || HairinessColorEnum::Chestnut) &&
            (AgeRangeEnum::MiddleAged === $age || AgeRangeEnum::Old) &&
            (SizeEnum::VeryTall === $size || SizeEnum::Small === $size || SizeEnum::Medium === $size) &&
            (in_array(CharacterEnum::Eccentricity, $characters) || in_array(CharacterEnum::Tolerance, $characters))
        ) {
            $prediction->predictDrink(BeerStyleEnum::BelgianStrongAle, ForcePredictionEnum::Strong);
        }

        // passionate
        if (
            (HairinessColorEnum::Blue || HairinessColorEnum::Green || HairinessColorEnum::Orange || HairinessColorEnum::Pink || HairinessColorEnum::Rainbow) &&
            (AgeRangeEnum::Young === $age || AgeRangeEnum::MiddleAged) &&
            (SizeEnum::VeryTall === $size || SizeEnum::Small === $size || SizeEnum::Medium === $size) &&
            (in_array(CharacterEnum::Optimism, $characters) || in_array(CharacterEnum::Respect, $characters))
        ) {
            $prediction->predictDrink(BeerStyleEnum::Saison, ForcePredictionEnum::Strong);
        }

        // sociable and relaxed spirit
        if (
            (HairinessColorEnum::Blonde || HairinessColorEnum::Brown || HairinessColorEnum::Pink || HairinessColorEnum::Rainbow) &&
            (AgeRangeEnum::Young === $age || AgeRangeEnum::MiddleAged) &&
            (SizeEnum::Medium === $size || SizeEnum::Tall === $size || SizeEnum::VeryTall === $size) &&
            (in_array(CharacterEnum::OpenMindedness, $characters) || in_array(CharacterEnum::Charisma, $characters))
        ) {
            $prediction->predictDrink(BeerStyleEnum::Weizenbier, ForcePredictionEnum::Strong);
        }

        return $prediction;
    }
}
