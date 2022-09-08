<?php

namespace App\Repositories\User;

use App\Repositories\User\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        return User::get();
    }

    public function createUser(array $userDetails)
    {

        return User::create($userDetails);
    }

     public function updateUser(int $id, array $userDetails)
     {
        if(User::where('id',$id)->exists())
        {
            return User::whereId($id)->update($userDetails);
        }
        return false;

     }

     public function deleteUser(int $id)
     {
      if(User::where('id',$id)->exists())
      {
        return User::destroy($id);
      }
       return false;
   }

}
