<?php


declare(strict_types=1);

namespace App\Event;

final class UserRegisteredEvent
{
    private string $email;
    private string $firstName;
    private string $lastName;

    public function __construct(string $email, string $firstName, string $lastName)
    {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    // Getters here...
    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}