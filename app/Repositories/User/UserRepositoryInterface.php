<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getAllUsers();
    public function createUser(array $userDetails);
    public function updateUser(int $id, array $userDetails);
    public function deleteUser(int $id);

}
