<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../utils/ui_bricks/header.php';
require_once __DIR__ . '/../utils/ui_bricks/footer.php';
require_once __DIR__.'/../utils/core_bricks/form/Form.php';
require_once __DIR__.'/../utils/core_bricks/form/FormElement.php';

$errors    = [];
$login     = '';
$name      = '';
$firstname = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login           = trim($_POST['login'] ?? '');
    $password        = $_POST['password'] ?? '';
    $passwordConfirm = $_POST['password_confirm'] ?? '';
    $name            = trim($_POST['name'] ?? '');
    $firstname       = trim($_POST['firstname'] ?? '');

    if (!filter_var($login, FILTER_VALIDATE_EMAIL) || mb_strlen($login) > 254) {
        $errors[] = "Veuillez saisir une adresse email valide.";
    }

    if (strlen($password) < 8 || strlen($password) > 72
        || !preg_match('/[a-z]/', $password)
        || !preg_match('/[A-Z]/', $password)
        || !preg_match('/\d/', $password)
        || !preg_match('/[^a-zA-Z\d]/', $password)) {
        $errors[] = "Le mot de passe doit contenir de 8 à 72 caractères, avec une minuscule, une majuscule, un chiffre et un caractère spécial.";
    }

    if ($password !== $passwordConfirm) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    $namePattern = "/^[\p{L}][\p{L} '\-]{1,49}$/u";
    if (!preg_match($namePattern, $name)) {
        $errors[] = "Le nom est invalide (2 à 50 lettres, espaces, tirets ou apostrophes).";
    }
    if (!preg_match($namePattern, $firstname)) {
        $errors[] = "Le prénom est invalide (2 à 50 lettres, espaces, tirets ou apostrophes).";
    }
}

$header = new Header(title: SITE_NAME, lang: Language::FRENCH->value, stylesheet: BASE_URL . '/assets/style.css');
$header->render();
?>

<?php foreach ($errors as $error): ?>
    <p style="color: #ff6b6b;"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
<?php endforeach; ?>

<?php
$form = new Form(action: "", method: Method::POST, className: "");

$form->addElement(new FormElement(
    name: "login",
    type: ElementType::EMAIL,
    label: "Email",
    value: $login,
    attributes: ["class" => "input", "required" => true]
));

$form->addElement(new FormElement(
    name: "password",
    type: ElementType::PASSWORD,
    label: "Mot de passe",
    attributes: ["class" => "input", "required" => true]
));

$form->addElement(new FormElement(
    name: "password_confirm",
    type: ElementType::PASSWORD,
    label: "Confirmer le mot de passe",
    attributes: ["class" => "input", "required" => true]
));

$form->addElement(new FormElement(
    name: "name",
    type: ElementType::TEXT,
    label: "Nom",
    value: $name,
    attributes: ["class" => "input"]
));

$form->addElement(new FormElement(
    name: "firstname",
    type: ElementType::TEXT,
    label: "Prénom",
    value: $firstname,
    attributes: ["class" => "input"]
));

$form->addElement(new FormElement(
    name: "submit_btn",
    type: ElementType::SUBMIT,
    value: "S'inscrire",
    attributes: ["class" => "classic-button", "style" => "color: #121212;"]
));

$form->render();
?>

<?php
$footer = new Footer(copyrightText: "StackGame", year: 2026, className: "site-footer");
$footer->render();
?>