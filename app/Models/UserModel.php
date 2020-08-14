<?php namespace App\Models;

use CodeIgniter\Model;


class UserModel extends Model
{

  protected $table = 'users';

  protected $allowedFields = ['username', 'firstName', 'lastName', 'email', 'password', 'created', 'modified', 'isActive'];


  public function login($username, $password){

    $db = \Config\Database::connect();
    $query = $db->query('SELECT password FROM users WHERE username = \'' . $username . '\' LIMIT 1');
    $row = $query->getRow();

    if (password_verify($password, $row->password))
    {
      return true;
    }
    else {
      return false;
    }
  }
}
