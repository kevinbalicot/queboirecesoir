<?php

declare(strict_types=1);

namespace App\Shared\Application\Rule;

use App\Shared\Application\Rule\Instrumentation\InstrumentationInterface;

abstract class AbstractRuleEngine implements RuleEngineInterface
{
    public function __construct(
        private readonly InstrumentationInterface $instrumentation,
        private readonly iterable $rules = []
    ) {
    }

    /**
     * @throws RuleEngineException
     * @throws RuleException
     */
    public function __invoke($subject): array
    {
        if (!$this->supports($subject)) {
            throw new RuleEngineException('Subject not supporting');
        }

        $this->instrumentation->start($this);

        $matchedRules = [];
        /** @var RuleInterface $rule */
        foreach ($this->rules as $rule) {
            if ($rule->when($subject)) {
                $this->instrumentation->match($this, $rule);
                $matchedRules[] = $rule;
            } else {
                $this->instrumentation->skip($this, $rule);
            }
        }

        $result = [];
        /** @var RuleInterface $matchedRule */
        foreach ($matchedRules as $matchedRule) {
            try {
                $result[] = $matchedRule->then($subject);
                $this->instrumentation->success($this, $matchedRule, $subject);
            } catch (\Exception $exception) {
                $this->instrumentation->error($this, $matchedRule, $subject, $exception->getMessage());
                throw new RuleException($exception->getMessage(), $exception->getCode(), $exception);
            }
        }

        return $result;
    }
}
