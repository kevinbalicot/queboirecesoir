<?php

declare(strict_types=1);

namespace App\Shared\Application\Rule\Instrumentation;

use App\Shared\Application\Rule\RuleEngineInterface;
use App\Shared\Application\Rule\RuleInterface;
use Psr\Log\LoggerInterface;

class Instrumentation implements InstrumentationInterface
{
    /**
     * @var string
     */
    public const NAME = 'abstract_rule_engine';

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function start(RuleEngineInterface $ruleEngine): void
    {
        $this->logger->info(\sprintf('%s.start', $ruleEngine->getName()), [
            'engine' => $ruleEngine->getDescription()
        ]);
    }

    public function match(RuleEngineInterface $ruleEngine, RuleInterface $rule): void
    {
        $this->logger->info(\sprintf('%s.match', $ruleEngine->getName()), ['rule' => $rule->getDescription()]);
    }

    public function skip(RuleEngineInterface $ruleEngine, RuleInterface $rule): void
    {
        $this->logger->info(\sprintf('%s.skip', $ruleEngine->getName()), ['rule' => $rule->getDescription()]);
    }

    public function success(RuleEngineInterface $ruleEngine, RuleInterface $rule, InstrumentableInterface $subject): void
    {
        $this->logger->info(\sprintf('%s.success', $ruleEngine->getName()), array_merge(
            ['rule' => $rule->getDescription()],
            ['data' => $subject->getData()],
        ));
    }

    public function error(
        RuleEngineInterface $ruleEngine,
        RuleInterface $rule,
        InstrumentableInterface $subject,
        string $reason
    ): void {
        $this->logger->error(\sprintf('%s.error', $ruleEngine->getName()), array_merge(
            ['rule' => $rule->getDescription()],
            ['reason' => $reason],
            ['data' => $subject->getData()]
        ));
    }
}
