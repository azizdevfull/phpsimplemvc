<?php
require_once ("Model.php");

class Book extends Model
{
    public function __construct()
    {
        parent::__construct('books'); // Pass the table name to the parent constructor
    }

}