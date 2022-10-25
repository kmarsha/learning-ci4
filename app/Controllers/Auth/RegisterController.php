<?php

namespace App\Controllers\Auth;

use App\Models\UserModel;
use App\Controllers\BaseController;

class RegisterController extends BaseController
{
    public function __construct()
    {
        $this->model = new UserModel;
    }
    
    public function index()
    {
        return view('auth/register', [
            'title' => 'Register Page'
        ]);
    }

    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        $first_name = $this->request->getPost('first_name');
        $last_name = $this->request->getPost('last_name');

        $this->model->insert([
            'username' => $username,
            'password' => $password,
            'firstName' => $first_name,
            'lastName' => $last_name
        ]);

        $data_session = [
            'isLogin' => true,
            'username' => $username,
        ];

        session()->set($data_session);

        return redirect()->route('home-page')->with('success', 'Register is success');
    }
}
