<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Users extends Controller
{

  public function index()
  {
    $data['title'] = 'Login';
    echo view('templates/header', $data);
    echo view('users/login');
    echo view('templates/footer');
  }

  public function login()
  {
    $data['title'] = "Login";
    echo view('templates/header', $data);
    echo view('users/login');
    echo view('templates/footer');
  }

  public function register()
  {
    $data['title'] = "Register";
    echo view('templates/header', $data);
    echo view('users/register');
    echo view('templates/footer');
  }
}
