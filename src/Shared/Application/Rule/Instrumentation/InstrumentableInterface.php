<?php

declare(strict_types=1);

namespace App\Shared\Application\Rule\Instrumentation;

interface InstrumentableInterface
{
    public function getData(): array;
}
