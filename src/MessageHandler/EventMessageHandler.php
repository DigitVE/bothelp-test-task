<?php

declare(strict_types=1);

namespace App\MessageHandler;

use App\Message\EventMessage;
use App\Service\EventService;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class EventMessageHandler
{
    public function __construct(
        private EventService $eventService,
        private LoggerInterface $logger,
    ) {
    }

    public function __invoke(EventMessage $message)
    {
        foreach ($message->getEventIds() as $eventId) {
            $this->eventService->handle();

            $this->logger->info('Processing completed for account id ' . $message->getAccountId() . ' with event id ' . $eventId);
        }
    }
}
