<?php

declare(strict_types=1);

use App\DrinkPrediction\Application\RuleEngine\PredictDrinkRuleEngine;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\tagged_iterator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->defaults()
        ->autowire()
        ->autoconfigure();

    $services->load('App\\DrinkPrediction\\', dirname(__DIR__, 2).'/src/DrinkPrediction');

    $services->set(PredictDrinkRuleEngine::class)
        ->arg('$rules', tagged_iterator('app.rule_engine.drink_prediction'));
};
