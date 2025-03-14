<?php

namespace App\Application\User;

use App\Domain\Users\User;
use App\Domain\Users\UserRepository;

class RegisterUser
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(
        string $userName,
        string $password,
        string $fullName,
        string $email,
        string $address,
        string $contactNumber,
        string $sex,
        int $age,
        bool $isAdmin
    ): void {
        $validate = $this->userRepository->findByUsername($userName);
        if ($validate) {
            return;
        }
        $data = new User(
            null,
            $userName,
            $password,
            $fullName,
            $email,
            $address,
            $contactNumber,
            $sex,
            $age,
            $isAdmin
        );
        $this->userRepository->create($data);
    }

    public function findAll()
    {
        return $this->userRepository->findAll();
    }

    public function findByUsername(string $username)
    {
        return $this->userRepository->findByUsername($username);
    }

    public function update(User $user): void
    {
        $this->userRepository->update($user);
    }

    public function delete(int $id): void
    {
        $this->userRepository->delete($id);
    }

    public function login($credentials)
    {
        return $this->userRepository->userLogin($credentials);
    }
}
