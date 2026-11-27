<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../utils/ui_bricks/header.php';
require_once __DIR__ . '/../utils/ui_bricks/footer.php';
require_once __DIR__.'/../utils/core_bricks/form/Form.php';
require_once __DIR__.'/../utils/core_bricks/form/FormElement.php';

$header = new Header(title: SITE_NAME, lang: Language::FRENCH->value, stylesheet: BASE_URL . '/assets/style.css');
$header->render();
?>

<?php foreach ($errors as $error): ?>
    <p style="color: #ff6b6b;"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
<?php endforeach; ?>

<?php

$form = new Form("/login", Method::POST, "user-registration-form");

$form->addElement(new FormElement(
    name: "login",
    type: ElementType::TEXT,
    label: "Email",
    attributes: ["placeholder" => "ex: johndoe@example.com", "required" => true]
));

$form->addElement(new FormElement(
    name: "password",
    type: ElementType::PASSWORD,
    label: "Mot de passe",
    attributes: ["required" => true]
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
    value: "Connexion",
    attributes: ["class" => "btn btn-primary"]
));

$form->render();

?>

<?php
$footer = new Footer(copyrightText: "StackGame", year: 2026, className: "site-footer");
$footer->render();
?>
