<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'users';

  protected $allowedFields = ['username', 'firstName', 'lastName', 'email', 'password', 'created', 'modified', 'isActive'];
}
