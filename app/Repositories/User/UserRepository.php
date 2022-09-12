<?php

namespace App\Repositories\User;

use App\Repositories\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    public function getAllUsers()
    {
        return  $this->model->where('role_id', '!=', 1)->get();
    }

    public function createUser(array $data)
    {
        $userDetails = [
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id'],
        ];

        return  $this->model->create($userDetails);
    }

    public function updateUser(int $id, array $data)
    {
        $userDetails = [
            'username' => $data['name'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id'],
        ];

        if ($this->model->where('id', $id)->exists()) {
            return $this->model->whereId($id)->update($userDetails);
        }

        return false;
    }

    public function deleteUser(int $id)
    {
        if ($this->model->where('id', $id)->exists()) {
            return $this->model->destroy($id);
        }
        return false;
    }
}
