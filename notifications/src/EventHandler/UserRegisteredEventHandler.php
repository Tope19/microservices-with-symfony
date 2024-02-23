<?php

declare(strict_types=1);

namespace App\EventHandler;

use App\Event\UserRegisteredEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class UserRegisteredEventHandler
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(UserRegisteredEvent $event)
    {
        // Log the event data
        $this->logger->info(sprintf("Received user registration Notification: %s, %s, %s\n", $event->getEmail(), $event->getFirstName(), $event->getLastName()));
    }
}