<?php

namespace App\Tests\Unit;

use App\Service\EventService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EventServiceTest extends KernelTestCase
{
    public function testSomething(): void
    {
        self::bootKernel();

        /** @var EventService $eventService */
        $eventService = static::getContainer()->get(EventService::class);

        $this->assertTrue($eventService->handle());
    }
}
