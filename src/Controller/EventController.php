<?php

declare(strict_types=1);

namespace App\Controller;

use App\Message\EventMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: "/event", name: "event_")]
class EventController extends AbstractController
{
    public function __construct(
        private MessageBusInterface $bus,
    ) {
    }

    #[Route('/handle', methods: ['POST'])]
    public function handleEvent(Request $request): Response
    {
        $requestData = $request->toArray();

        $accountEventsMapping = [];

        foreach ($requestData as $entry) {
            $accountEventsMapping[$entry['account_id']][] = $entry['event_id'];
        }

        foreach ($accountEventsMapping as $key => $item) {
            $this->bus->dispatch(new EventMessage(
                accountId: $key,
                eventIds: $item
            ));
        }

        return $this->json(['success' => true]);
    }
}
