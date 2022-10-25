<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function __construct()
    {
        $this->model = new UserModel;
    }

    public function index()
    {
        return view('auth/login', [
            'title' => 'Login Page'
        ]);
    }

    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->model->where('username', $username)->first();

        $verify_pass = password_verify($password, $user->password);

        if ($verify_pass) {
            $data_session = [
                'isLogin' => true,
                'username' => $username
            ];

            session()->set($data_session);

            return redirect()->route('home-page')->with('success', 'Login is success');
        } else {
            return redirect()->back()->withInput()->with('error', 'Password is wrong');
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->route('home-page')->with('success', 'Logout is success');
    }
}
