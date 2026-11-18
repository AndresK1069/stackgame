<?php
class UserController {
    private UserModel $user_model;

    public function __construct(PDO $pdo)
    {
        $this->user_model = new UserModel($pdo);
    }

    public function index() {
        include __DIR__ . "/../view/homepage.php";
    }

    public function showLogin() {
        include __DIR__ . "/../view/authentification.php";
    }

    public function showSubscribe() {
	include __DIR__ . "/../view/subscription.php";
    }

    public function submitLogin() {
        $login = trim($_POST['login'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = $this->get_user_from_login_password($login, $password);

        if ($user != null) {
            session_start();
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];

            if ($user['login'] == "adminsys") {
                include __DIR__ . "/../view/adminsys.php";
            }
            else if ($user['login'] == "adminweb") {
                include __DIR__ . "/../view/stats.php";
            }
            else {
                header('Location: /');
            }
        } 
        else {
            header('Location: /login');
        }
        exit;
    }

    public function submitLogout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        header('Location: /');
    }

    public function submitSubscribe() {
        $login = trim($_POST['login'] ?? '');
        $password = $_POST['password'] ?? '';
        $name = $_POST['name'] ?? '';
        $firstname = $_POST['firstname'] ?? '';
        $this->user_model->add_user($login, $password, $name, $firstname);
        header('Location: /');
    }

    private function get_user_from_login_password(string $login, string $password) {
        return $this->user_model->get_user_from_login_password($login, $password);
    }
}
?>
