<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Users extends Controller
{
  public function index()
  {
    echo view('users/login');
  }

  public function login()
  {
    echo view('users/login');
  }
}
