<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:generate-request-events',
    description: 'This command generates mock events for testing purposes.',
    hidden: false
)]
class GenerateRequestEventsCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $eventsCount = 10000;
        $accountsCount = 1000;
        $eventsPerAccount = $eventsCount / $accountsCount;

        $events = [];

        for ($accountId = 1;$accountId <= $accountsCount;$accountId++) {
            for ($eventId = 1;$eventId <= $eventsPerAccount;$eventId++) {
                $events[] = [
                    'account_id' => $accountId,
                    'event_id'   => $eventId,
                ];
            }
        }

        $output->write(json_encode($events));

        return Command::SUCCESS;
    }
}
