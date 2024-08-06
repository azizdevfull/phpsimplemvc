<?php

require_once 'models/User.php';

class UserController
{
    // To make the connection with model
    private $model;

    public function __construct()
    {
        // create user model object
        $this->model = new User();
        session_start();
    }

    // select all users
    public function index()
    {
        // To model
        $users = $this->model->all();

        // To views
        require 'views/users/index.php';
    }

    // select detail for user id
    public function show()
    {
        $id = $_GET['id'];
        $user = $this->model->find($id);
        require 'views/users/detail.php';
    }

    // show the add user view form
    public function create()
    {
        require 'views/users/create.php';
    }

    public function store()
    {
        // validation request mehotd
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            require 'views/utilities/404.php';
        }

        $name = $_POST['name'];
        $email = $_POST['email'];

        // validation data input
        if (empty($name) || empty($email)) {
            $_SESSION['message'] = 'Data cannot be empty';
            require 'views/users/create.php';
            return;
        }

        if ($this->model->checkEmailExists($email)) {
            $_SESSION['message'] = 'Email already exists';
            require 'views/users/create.php';
            return;
        }
        $data = ['name' => $name, 'email' => $email];
        if ($this->model->create($data)) {
            $_SESSION['message'] = 'New user has been added';
            header('Location: /users'); // Redirect after successful deletion
            exit;
        }

    }

    public function edit()
    {
        $id = $_GET['id'];
        $user = $this->model->find($id);
        require 'views/users/edit.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $data = ['name' => $name, 'email' => $email];

        if ($this->model->update($id, $data)) {
            $_SESSION['message'] = 'User has been updated';
            header('Location: /users'); // Redirect after successful deletion
            exit;
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        if ($this->model->delete($id)) {
            $_SESSION['message'] = 'User has been deleted';
            header('Location: /users'); // Redirect after successful deletion
            exit;
        }
    }

}