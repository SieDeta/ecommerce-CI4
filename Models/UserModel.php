<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
     protected $table = 'user';
     protected $primaryKey = 'id';
     protected $allowedFields = [
          'username', 'password', 'role'
     ];

     public function get_id_user($id)
     {
          return $this->builder()
               ->where('id', $id)
               ->get()
               ->getRow();
     }

     public function getUsers()
    {
        return $this->findAll();
    }

    public function addUser($data)
    {
        return $this->insert($data);
    }

    public function changePassword($userId, $newPassword)
    {
        return $this->update($userId, ['password' => md5($newPassword)]);
    }

    public function updateUser($userId, $data)
    {
        return $this->update($userId, $data);
    }
}

