<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Symfony\Messenger;

use App\Shared\Application\Command\CommandBusInterface;
use App\Shared\Application\Command\CommandInterface;
use App\Shared\Domain\Http\Exception\HttpException;
use App\Shared\Domain\Instrumentation\InstrumentationInterface;
use App\Shared\Infrastructure\Symfony\Messenger\Exception\CommandHandlerException;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class MessengerCommandBus implements CommandBusInterface
{
    use HandleTrait;

    public function __construct(
        MessageBusInterface $commandBus
    ) {
        $this->messageBus = $commandBus;
    }

    /**
     * @throws \Throwable
     */
    public function dispatch(CommandInterface $command): mixed
    {
        try {
            $response = $this->handle($command);

            return $response;
        } catch (HandlerFailedException $exception) {
            $handlerException = new CommandHandlerException('Error during process', $exception);
            $firstException = $handlerException->getFirst();

            if ($firstException instanceof HttpException) {
                throw $firstException;
            }

            throw $handlerException;
        }
    }
}
