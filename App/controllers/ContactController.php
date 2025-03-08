<?php

namespace App\Controllers;

use Framework\Database;

class ContactController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath("config/db.php");
        $this->db = new Database($config);
    }
    public function index()
    {
        loadView("contact");
    }
}