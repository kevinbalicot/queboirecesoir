<?php

declare(strict_types=1);

namespace App\Shared\Application\Rule;

interface RuleEngineInterface
{
    public function supports(mixed $subject): bool;

    public function getName(): string;

    public function getDescription(): string;
}