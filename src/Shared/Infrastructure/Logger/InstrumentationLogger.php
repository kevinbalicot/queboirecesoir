<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Logger;

use App\Shared\Domain\Instrumentation\InstrumentationInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class InstrumentationLogger implements InstrumentationInterface
{
    public const LOG_CHANNEL = 'log';

    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly NormalizerInterface $normalizable
    ) {
    }

    public function start(string $chanel, mixed $context, bool $normalize = false): void
    {
        if (null === $context) {
            $context = [];
        }

        $this->logger->info(
            $chanel,
            $normalize ?
                (array) $this->normalizable->normalize($context, null, ['groups' => self::LOG_CHANNEL]) :
                (array) $context
        );
    }

    public function success(string $chanel, mixed $context, bool $normalize = false): void
    {
        if (null === $context) {
            $context = [];
        }

        $this->logger->info(
            sprintf('%s.success', $chanel),
            $normalize ?
                (array) $this->normalizable->normalize($context, null, ['groups' => self::LOG_CHANNEL]) :
                (array) $context
        );
    }

    public function error(string $chanel, string $reason, array $context = []): void
    {
        $this->logger->error(
            sprintf('%s.error', $chanel),
            [
                ...$context,
                'reason' => $reason,
            ]
        );
    }
}
