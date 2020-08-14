<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

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
    $model = new UserModel();

    $data['title'] = "Login";

    if($this->request->getPost())
    {
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');

      if($model->login($username, $password)){
        echo view('templates/header', $data);
        echo view('users/login_success', ['user' => $username]);
        echo view('templates/footer');
      }
      else {
        echo view('templates/header', $data);
        echo view('users/login_success', ['user' => 'Failed']);
        echo view('templates/footer');
      }
    }
    else{
      echo view('templates/header', $data);
      echo view('users/login');
      echo view('templates/footer');
    }
  }

  public function register()
  {
    helper(['form', 'url']);
    $model = new UserModel();

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
        $model->save([
          'username' => $this->request->getPost('userName'),
          'firstName' => $this->request->getPost('firstName'),
          'lastName' => $this->request->getPost('lastName'),
          'email' => $this->request->getPost('email'),
          'password' => password_hash($this->request->getPost('password1'), PASSWORD_DEFAULT),
          'created' => new Time('now'),
          'modified' => new Time('now'),
          'isActive' => true
        ]);
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
