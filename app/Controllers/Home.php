<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function homePage()
    {
        return view('home', ['title' => 'Home']);
    }

    public function placeholder($var1, $var2, $var3)
    {
        return "Placeholder 1: $var1 <br> Placeholder 2: $var2 <br> Placeholder 3: $var3";
    }

    public function adminHome()
    {
        return view('admin/home', [
            'title' => 'Home Admin'
        ]);
    }

    public function employeeHome()
    {
        return view('employee/home', [
            'title' => 'Home Employee'
        ]);
    }
}
