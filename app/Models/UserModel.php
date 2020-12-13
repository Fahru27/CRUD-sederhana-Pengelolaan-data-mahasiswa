<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $returnType     = 'array';

    protected $allowedFields = ['user_name', 'user_email', 'user_password'];

    protected $useTimestamps = true;
    protected $createdField  = 'user_created_at';
    protected $updatedField  = 'user_updated_at';


    public function getUser($user_id = false)
    {

        if ($user_id == false) {
            return $this->findAll();
        }

        return $this->where(['user_id' => $user_id])->first();
    }
}
