<?php

namespace App\Controllers;

use Framework\Database;

class ServiceController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath("config/db.php");
        $this->db = new Database($config);
    }
    public function index()
    {

        loadView("service");
    }
}