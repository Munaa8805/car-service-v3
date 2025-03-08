<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;


class UserController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath("config/db.php");
        $this->db = new Database($config);
    }
    public function login()
    {

        loadView("auth/login");
    }

    public function create()
    {
        loadView("auth/create");
    }
    public function store()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];
        $errors = [];
        // Validate name



        if (!empty($errors)) {
            loadView("auth/create", [
                'errors' => $errors,
                "user" =>
                [
                    "name" => $name,
                    "email" => $email,
                    "city" => $city,
                    "state" => $state
                ]
            ]);
            exit;
        }

        //// Email exists
        $params = [
            'email' => $email,
        ];

        $existingUserEmail = $this->db->query("SELECT * FROM users WHERE email = :email", $params)->fetch();
        if ($existingUserEmail) {
            $errors['email'] = "Email already exists.";
            loadView("auth/create", [
                'errors' => $errors,
                "user" =>
                [
                    "name" => $name,
                    "email" => $email,
                    "city" => $city,
                    "state" => $state
                ]
            ]);
            exit;
        }
        //// Create user
        $params = [
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];
        $this->db->query("INSERT INTO users (name, email, city, state, password) VALUES (:name, :email, :city, :state, :password)", $params);


        //// Get new user id
        $userId = $this->db->conn->lastInsertId();


        redirect('/auth/login');
    }
    public function logout()
    {


        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain']);
        redirect('/');
    }

    public function authenticate()
    {
        // inspectAndDie("login");
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = [];



        // Check for errors
        if (!empty($errors)) {
            loadView('auth/login', [
                'errors' => $errors
            ]);
            exit;
        }

        // Check for email
        $params = [
            'email' => $email
        ];

        $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();

        if (!$user) {
            $errors['email'] = 'Incorrect credentials';
            loadView('auth/login', [
                'errors' => $errors
            ]);
            exit;
        }

        // Check if password is correct
        if (!password_verify($password, $user['password'])) {
            $errors['email'] = 'Incorrect credentials';
            loadView('auth/login', [
                'errors' => $errors
            ]);
            exit;
        }



        redirect('/');
    }
}