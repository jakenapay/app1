<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = "users";
    protected $primary_key = "id";
    protected $allowedFields = [
        'id',
        'firstName',
        'lastName',
        'email',
        'password',
        'confirmPassword',
        'role',
        'status',
        'token',
        'ucreadted_at',
        'uupdated_at'
    ];
}