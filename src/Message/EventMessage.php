<?php

declare(strict_types=1);

namespace App\Message;

class EventMessage
{
    public function __construct(
        private int $accountId,
        private array $eventIds
    ) {
    }

    public function getAccountId(): int
    {
        return $this->accountId;
    }

    public function getEventIds(): array
    {
        return $this->eventIds;
    }
}
