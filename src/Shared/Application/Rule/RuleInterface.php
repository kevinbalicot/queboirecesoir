<?php

declare(strict_types=1);

namespace App\Shared\Application\Rule;

interface RuleInterface
{
    public function when(mixed $subject): bool;

    public function then($subject);

    public function getDescription(): string;
}
