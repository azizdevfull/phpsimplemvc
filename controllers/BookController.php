<?php

require_once 'models/Book.php';

class BookController
{
    // To make the connection with model
    private $model;

    public function __construct()
    {
        // create user model object
        $this->model = new Book();
    }

    // select all books
    public function index()
    {
        // To model
        $books = $this->model->all();

        // To views
        require 'views/books/index.php';
    }

    // select detail for user id
    public function view()
    {
        $id = $_GET['id'];
        $book = $this->model->find($id);
        require 'views/books/detail.php';
    }

}