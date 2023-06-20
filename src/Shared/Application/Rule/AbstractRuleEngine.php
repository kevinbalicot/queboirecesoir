<?php

declare(strict_types=1);

namespace App\Shared\Application\Rule;

abstract class AbstractRuleEngine implements RuleEngineInterface
{
    public function __construct(
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

        $matchedRules = [];
        /** @var RuleInterface $rule */
        foreach ($this->rules as $rule) {
            if ($rule->when($subject)) {
                $matchedRules[] = $rule;
            }
        }

        $result = [];
        /** @var RuleInterface $matchedRule */
        foreach ($matchedRules as $matchedRule) {
            try {
                $result[] = $matchedRule->then($subject);
            } catch (\Exception $exception) {
                throw new RuleException($exception->getMessage(), $exception->getCode(), $exception);
            }
        }

        return $result;
    }
}
