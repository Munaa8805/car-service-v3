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
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];
        $errors = [];
        if (!Validation::email($email)) {
            $errors['email'] = "Invalid email address.";
        }
        if (!Validation::string($name, 2, 50)) {
            $errors['name'] = "Name must be between 2 and 50 characters.";
        }

        if (!Validation::string($password, 4, 50)) {
            $errors['password'] = "Password must be between 4 and 50 characters.";
        }
        if (!Validation::match($password, $password_confirmation)) {
            $errors['password_confirm'] = "Passwords do not match.";
        }

        if (!empty($errors)) {
            loadView("auth/create", [
                'errors' => $errors,
                "user" =>
                [
                    "name" => $name,
                    "email" => $email,
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
                ]
            ]);
            exit;
        }
        //// Create user
        $params = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];
        $this->db->query("INSERT INTO users (name, email,  password) VALUES (:name, :email, :password)", $params);


        //// Get new user id
        $userId = $this->db->conn->lastInsertId();
        Session::set('user', [
            'id' => $userId,
            'name' => $name,
            'email' => $email,
        ]);

        redirect('/auth/login');
    }
    public function logout()
    {
        Session::clear('user');
        Session::destroy();

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

        // Validation
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email';
        }

        if (!Validation::string($password, 4, 50)) {
            $errors['password'] = 'Password must be at least 6 characters';
        }

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



        // inspectAndDie($user->password);


        if (!password_verify($password, $user->password)) {
            $errors['email'] = 'Incorrect credentials';
            loadView('auth/login', [
                'errors' => $errors
            ]);
            exit;
        }

        // Set user session
        Session::set('user', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);

        redirect('/detail');
    }
    public function detail()
    {
        loadView('detail');
    }
}