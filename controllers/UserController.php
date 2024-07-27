<?php

require_once 'models/User.php';

class UserController 
{
    // To make the connection with model
    private $model;

    public function __construct() {
        // create user model object
        $this->model = new User();
        session_start();
    }

    // select all users
    public function index() {
        // To model
        $users = $this->model->getUsers();

        // To views
        require 'views/users/index.php';
    }

    // select detail for user id
    public function view() {
        $id = $_GET['id'];
        $user = $this->model->getUserById($id);
        require 'views/users/detail.php';
    }

    // show the add user view form
    public function add() {
        require 'views/users/add.php';
    }

    public function insert() {
        // validation request mehotd
        if($_SERVER['REQUEST_METHOD'] != 'POST') {
            require 'views/utilities/404.php';
        }

        $name = $_POST['name'];
        $email = $_POST['email'];

        // validation data input
        if(empty($name) || empty($email)) {
            $_SESSION['message'] = 'Data cannot be empty';
            require 'views/users/add.php';
            return;
        }

        if($this->model->checkEmailExists($email)) {
            $_SESSION['message'] = 'Email already exists';
            require 'views/users/add.php';
            return;
        }

        if($this->model->insertUser($name,$email)) {
            $_SESSION['message'] = 'New user has been added';
            require 'views/users/add.php';
            return;
        }
        
    }

}