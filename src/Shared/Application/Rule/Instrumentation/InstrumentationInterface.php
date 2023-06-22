<?php

declare(strict_types=1);

namespace App\Shared\Application\Rule\Instrumentation;


use App\Shared\Application\Rule\RuleEngineInterface;
use App\Shared\Application\Rule\RuleInterface;

interface InstrumentationInterface
{
    public function start(RuleEngineInterface $ruleEngine): void;

    public function match(RuleEngineInterface $ruleEngine, RuleInterface $rule): void;

    public function success(RuleEngineInterface $ruleEngine, RuleInterface $rule, InstrumentableInterface $subject): void;

    public function skip(RuleEngineInterface $ruleEngine, RuleInterface $rule): void;

    public function error(
        RuleEngineInterface $ruleEngine,
        RuleInterface $rule,
        InstrumentableInterface $subject,
        string $reason
    ): void;
}
