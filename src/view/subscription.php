<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../utils/ui_bricks/header.php';
require_once __DIR__ . '/../utils/ui_bricks/footer.php';
require_once __DIR__.'/../utils/core_bricks/form/Form.php';
require_once __DIR__.'/../utils/core_bricks/form/FormElement.php';

$errors    ??= [];
$login     ??= '';
$name      ??= '';
$firstname ??= '';

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
    name: "captcha",
    type: ElementType::TEXT,
    label: "Code de sécurité",
    attributes: ["placeholder" => "code", "maxlength" => "5", "required" => true, "autocomplete" => "off"]
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