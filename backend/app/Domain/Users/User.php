<?php

namespace App\Domain\Users;

class User
{
    private ?int $id;

    private string $username;

    private string $password;

    private string $full_name;

    private string $email;

    private string $address;

    private string $contact_number;

    private string $sex;

    private int $age;

    private bool $isAdmin;

    public function __construct(
        ?int $id = null,
        ?string $username = null,
        ?string $password = null,
        ?string $full_name = null,
        ?string $email = null,
        ?string $address = null,
        ?string $contact_number = null,
        ?string $sex = null,
        ?int $age = null,
        ?bool $isAdmin = null
    ) {
        $this->id = $id ?? 0;
        $this->username = $username ?? '';
        $this->password = $password ?? '';
        $this->full_name = $full_name ?? '';
        $this->email = $email ?? '';
        $this->address = $address ?? '';
        $this->contact_number = $contact_number ?? '';
        $this->sex = $sex ?? '';
        $this->age = $age ?? 0;
        $this->isAdmin = $isAdmin ?? false;
    }

    public function getID(): ?int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getIsAdmin(): bool
    {
        return $this->isAdmin;
    }

    public function getFullName(): string
    {
        return $this->full_name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getContactNumber(): string
    {
        return $this->contact_number;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}
