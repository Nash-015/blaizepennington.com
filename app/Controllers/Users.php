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
    helper(['form', 'url']);

    //$validation = \Config\Services::validation();
    // $validation->setRules(['userName' => ['label' => 'Username', 'rules' => 'required'],
    // 'firstName' => ['label' => 'First Name', 'rules' => 'required'],
    // 'lastName' => ['label' => 'lastName', 'rules' => 'required'],
    // 'email' => ['label' => 'email', 'rules' => 'required'],
    // 'password1' => ['label' => 'Password', 'rules' => 'required'],
    // 'password2' => ['label' => 'Repeat Password', 'rules' => 'required']]);
    if($this->request->getPost())
    {
      if(! $this->validate('signup'))
      {
        echo view('templates/header', ['title' => 'Register']);
        echo view('users/register', ['validation' => $this->validator]);
        echo view('templates/footer');
      }
      else
      {
        echo view('templates/header', ['title' => 'Success!']);
        echo view('users/success');
        echo view('templates/footer');
      }
    }
    else {
      $this->validate([]);
      echo view('templates/header', ['title' => 'Register']);
      echo view('users/register', ['validation' => $this->validator]);
      echo view('templates/footer');
    }



  }
}
