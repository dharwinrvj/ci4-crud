<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthenticationModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['email', 'pass', 'hint'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = ['email' => 'is_unique[users.email]'];
    protected $validationMessages = ['email' => ['is_unique' => 'This E-Mail is already in use ']];
    // protected $skipValidation     = false;
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    protected function beforeInsert(array $data)
    {
        if (isset($data['data']['pass'])) {
            $data['data']['pass'] = password_hash($data['data']['pass'], PASSWORD_DEFAULT);
            return $data;
        }
    }
    protected function beforeUpdate(array $data)
    {
        if (isset($data['data']['pass'])) {
            $data['data']['pass'] = password_hash($data['data']['pass'], PASSWORD_DEFAULT);
            return $data;
        }
    }
}
