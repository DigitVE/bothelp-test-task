<?php

declare(strict_types=1);

namespace App\Service;

class EventService
{
    public function handle(): bool
    {
        sleep(1);

        return true;
    }
}
