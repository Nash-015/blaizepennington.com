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

  public function setUser($username){
    $session = session();
    $db = \Config\Database::connect();
    $query = $db->query('SELECT * FROM users WHERE username = \'' . $username . '\' LIMIT 1');
    $user = $query->getRow();

    $data = [
      'id' => $user->id,
      'username' => $user->username,
      'firstName' => $user->firstName,
      'lastName' => $user->lastName,
      'email' => $user->email,
      'logged_in' => true
    ];

    $session->set($data);
  }
}
