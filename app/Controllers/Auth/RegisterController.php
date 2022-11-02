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
        $rules = [
            'first_name' => 'required|alpha_space|min_length[3]',
            'last_name' => 'required|alpha_space',
            'username' => 'required|alpha_dash|min_length[3]|is_unique[users.username]',
            'password' => 'required|alpha_numeric_punct|min_length[4]',
        ];

        $error_message = [
            'username' => [
                'required' => 'You must fill in the Username it Importans!',
                'is_unique' => 'Username not available'
            ],
        ];

        $validated = $this->validate($rules, $error_message);

        if ($validated) {
            $username = $this->request->getPost('username');
            $password = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
            $first_name = $this->request->getPost('first_name');
            $last_name = $this->request->getPost('last_name');
            $role = 'employee';

            $this->model->insert([
                'firstName' => $first_name,
                'lastName' => $last_name,
                'username' => $username,
                'password' => $password,
                'role' => $role,
            ]);

            $data_session = [
                'isLogin' => true,
                'username' => $username,
                'role' => $role,
            ];

            session()->set($data_session);

            return redirect()->route('employee-page')->with('success', 'Register is success');
        } else {
            return redirect()->back()->withInput()->with('error', 'Register is failed');
        }
    }
}
