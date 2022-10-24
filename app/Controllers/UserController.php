<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->model = new UserModel;
    }

    public function index()
    {
        return view('user/index', [
            'users' => $this->model->findAll(),
            'title' => 'User Page'
        ]);
    }

    public function new()
    {
        return view('user/new', [
            'title' => 'New User Page'
        ]);
    }

    public function create()
    {
        $first_name = $this->request->getPost('first_name');
        $last_name = $this->request->getPost('last_name');

        $this->model->insert([
            'firstName' => $first_name,
            'lastName' => $last_name,
        ]);

        return redirect()->route('user')->with('success', 'New User have been added');
    }

    public function edit($id)
    {
        $user = $this->model->find($id);

        return view('user/edit', [
            'title' => 'Edit User Page',
            'user' => $user,
        ]);
    }

    public function update($id)
    {
        $first_name = $this->request->getPost('first_name');
        $last_name = $this->request->getPost('last_name');

        $this->model->update($id, [
            'firstName' => $first_name,
            'lastName' => $last_name,
        ]);

        return redirect()->route('user')->with('success', 'User have been edited');
    }

    public function delete($id)
    {
        $this->model->delete($id);

        return redirect()->route('user')->with('success', 'User have been deleted');
    }
}
