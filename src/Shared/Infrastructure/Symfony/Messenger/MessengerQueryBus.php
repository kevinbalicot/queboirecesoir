<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Symfony\Messenger;

use App\Shared\Application\Query\QueryBusInterface;
use App\Shared\Application\Query\QueryInterface;
use App\Shared\Domain\Http\Exception\HttpException;
use App\Shared\Domain\Instrumentation\InstrumentationInterface;
use App\Shared\Infrastructure\Symfony\Messenger\Exception\QueryHandlerException;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class MessengerQueryBus implements QueryBusInterface
{
    use HandleTrait;

    public function __construct(
        MessageBusInterface $queryBus
    ) {
        $this->messageBus = $queryBus;
    }

    /**
     * @throws QueryHandlerException
     * @throws HttpException
     */
    public function ask(QueryInterface $query): mixed
    {
        try {
            $response = $this->handle($query);

            return $response;
        } catch (HandlerFailedException $exception) {
            $handlerException = new QueryHandlerException('Error during process', $exception);
            $firstException = $handlerException->getFirst();

            if ($firstException instanceof HttpException) {
                throw $firstException;
            }

            throw $handlerException;
        }
    }
}
