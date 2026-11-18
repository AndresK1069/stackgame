<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../utils/ui_bricks/header.php';
require_once __DIR__ . '/../utils/ui_bricks/footer.php';

$header = new Header(title: SITE_NAME, lang: Language::FRENCH->value, stylesheet: BASE_URL . '/assets/style.css');
$header->render();

?>

<header>
    <a href="/login">Se connecter</a>
	<a href="/subscribe">Inscription</a>
</header>

<?php
$footer = new Footer(copyrightText: "StackGame", year: 2026, className: "site-footer");
$footer->render();
?>
