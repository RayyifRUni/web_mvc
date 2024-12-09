<?php



class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->user->login($username, $password)) {
                $_SESSION['username'] = $username;
                header('Location: index.php');
                exit();
            } else {
                return ['error' => 'Invalid username or password'];
            }
        }
        require_once('Views/users/login.php');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->user->register($username, $password)) {
                header('Location: index.php');
                exit();
            } else {
                return ['error' => 'Registration failed'];
            }
        }
        require_once('Views/users/register.php');
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
