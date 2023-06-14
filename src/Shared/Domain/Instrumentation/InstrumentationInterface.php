<?php

declare(strict_types=1);

namespace App\Shared\Domain\Instrumentation;

interface InstrumentationInterface
{
    public function start(string $chanel, mixed $context, bool $normalize = false): void;

    public function success(string $chanel, mixed $context, bool $normalize = false): void;

    public function error(string $chanel, string $reason, array $context = []): void;
}
