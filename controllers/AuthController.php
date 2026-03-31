<?php
require_once 'models/UserModel.php';

class AuthController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

  public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // lấy theo email thôi
        $user = $this->model->selectOne(
            "SELECT * FROM users WHERE email = ?",
            [$email]
        );

        // DEBUG
        // var_dump($user); die();

        if ($user && $password === $user['password']) {

            $_SESSION['user'] = $user;

            if ($user['role'] === 'admin') {
                header("Location: index.php?url=admin");
            } else {
                header("Location: index.php");
            }
            exit();

        } else {
            $error = "Sai email hoặc mật khẩu!";
        }
    }

    require 'views/client/login.php';
}
    // ================= REGISTER =================
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $address = $_POST['address'] ?? '';

            // check email tồn tại
$check = $this->model->selectOne(
    "SELECT * FROM users WHERE email = ?",
    [$email]
);

if ($check) {
    $error = "Email đã tồn tại!";
} else {
    $this->model->insert(
        "INSERT INTO users (name, email, password, phone, address, role)
         VALUES (?, ?, ?, ?, ?, 'user')",
        [$name, $email, $password, $phone, $address]
    );

    header("Location: index.php?url=login");
    exit();
}

        require 'views/client/register.php';
    }
    }

    // ================= LOGOUT =================
    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

        header("Location: index.php?url=login");
        exit();
    }

    // ================= CHECK LOGIN =================
    public static function checkLogin() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header("Location: index.php?url=login");
            exit();
        }
    }

    // ================= CHECK ADMIN =================
    public static function checkAdmin() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: index.php?url=login");
            exit();
        }
    }
}