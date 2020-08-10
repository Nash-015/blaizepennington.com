<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Page extends Controller
{
  public function index()
  {
    return view('home');
  }
  public function view($page = 'home')
  {
    if (!is_file(APPPATH.'/Views/' . $page . '.php'))
    {
      throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }

    $data['title'] = ucfirst($page);
    echo view('templates/header', $data);
    echo view($page, $data);
    echo view('templates/footer', $data);
  }
}
