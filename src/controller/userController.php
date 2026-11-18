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
        $login = strtolower(trim($_POST['login'] ?? ''));
        $pwd = $_POST['password'] ?? '';

        $user = $this->get_user_from_login_password($login, $pwd);

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
        $login           = strtolower(trim($_POST['login'] ?? ''));
        $password        = $_POST['password'] ?? '';
        $passwordConfirm = $_POST['password_confirm'] ?? '';
        $name            = trim($_POST['name'] ?? '');
        $firstname       = trim($_POST['firstname'] ?? '');

        $errors = $this->validate_subscription($login, $password, $passwordConfirm, $name, $firstname);

        try {
            if (empty($errors) && $this->user_model->login_exists($login)) {
                $errors[] = "Un compte existe déjà avec cet email.";
            }

            if (empty($errors)) {
                if (!$this->user_model->add_user($login, $password, $name, $firstname)) {
                    $errors[] = "Un compte existe déjà avec cet email.";
                }
            }
        }
        catch (RuntimeException | PDOException $e) {
            $errors[] = "La création du compte est temporairement indisponible.";
        }

        if (!empty($errors)) {
            include __DIR__ . "/../view/subscription.php";
            return;
        }

        header('Location: /');
        exit;
    }

    private function validate_subscription(string $login, string $password, string $passwordConfirm, string $name, string $firstname): array {
        $errors = [];

        if (!filter_var($login, FILTER_VALIDATE_EMAIL) || strlen($login) > 100) {
            $errors[] = "Veuillez saisir une adresse email valide (100 caractères maximum).";
        }

        if (trim($password) === ''
            || strlen($password) < 8 || strlen($password) > 72
            || !preg_match('/[a-z]/', $password)
            || !preg_match('/[A-Z]/', $password)
            || !preg_match('/\d/', $password)
            || !preg_match('/[^a-zA-Z\d]/', $password)) {
            $errors[] = "Le mot de passe doit contenir de 8 à 72 caractères, avec une minuscule, une majuscule, un chiffre et un caractère spécial.";
        }

        if (!hash_equals($password, $passwordConfirm)) {
            $errors[] = "Les mots de passe ne correspondent pas.";
        }

        $namePattern = "/^[\p{L}][\p{L} '\-]{1,49}$/u";
        if (!preg_match($namePattern, $name)) {
            $errors[] = "Le nom est invalide (2 à 50 lettres, espaces, tirets ou apostrophes).";
        }
        if (!preg_match($namePattern, $firstname)) {
            $errors[] = "Le prénom est invalide (2 à 50 lettres, espaces, tirets ou apostrophes).";
        }

        return $errors;
    }

    private function get_user_from_login_password(string $login, string $password) {
        return $this->user_model->get_user_from_login_password($login, $password);
    }
}
?>