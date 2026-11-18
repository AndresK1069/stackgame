<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../utils/ui_bricks/header.php';
require_once __DIR__ . '/../utils/ui_bricks/footer.php';
require_once __DIR__.'/../utils/core_bricks/form/Form.php';
require_once __DIR__.'/../utils/core_bricks/form/FormElement.php';

$header = new Header(title: SITE_NAME, lang: Language::FRENCH->value, stylesheet: BASE_URL . '/assets/style.css');
$header->render();
?>

<?php
$form = new Form(action: "", method: Method::POST, className: "");

$form->addElement(new FormElement(
        name: "login",
        type: ElementType::EMAIL,
        label: "Email",
        attributes: ["class" => "input", "required" => true]
));

$form->addElement(new FormElement(
        name: "password",
        type: ElementType::PASSWORD,
        label: "Mot de passe",
        attributes: ["class" => "input", "required" => true]
));

$form->addElement(new FormElement(
        name: "name",
        type: ElementType::TEXT,
        label: "Nom",
        attributes: ["class" => "input"]
));

$form->addElement(new FormElement(
        name: "firstname",
        type: ElementType::TEXT,
        label: "Prénom",
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
