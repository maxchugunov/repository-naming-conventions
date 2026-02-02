<?php

use Exception\UserAddException;
use Exception\UserGetException;
use Exception\UserUpdateException;

interface UserRepositoryInterface
{
    /**
     * @throws UserGetException
     */
    public function get(string $id): User;

    /**
     * @throws UserGetException
     */
    public function getMany(array $ids): array;

    /**
     * @throws UserGetException
     *
     * @return User[]
     */
    public function getBySpec(Spec $spec): array;

    public function find(int $id): ?User;

    /**
     * @return User[]
     */
    public function findMany(array $ids): array;

    public function findBySpec(Spec $spec): array;

    /**
     * @return User[]
     */
    public function findAll(): array;

    /**
     * @throws UserAddException
     */
    public function add(User $user): void;

    /**
     * @param $users User[]
     */
    public function addMany(array $users): void;

    /**
     * @throws UserUpdateException
     */
    public function update(User $user): void;

    /**
     * @param $users User[]
     * @throws UserUpdateException
     */
    public function updateMany(array $users): void;

    public function remove(int $id): void;

    public function removeMany(array $ids): void;

    public function removeBySpec(Spec $spec): void;

    public function removeAll(): void;

    /**
     * @throws UserGetException
     */
    public function getByName(string $name): User;
}