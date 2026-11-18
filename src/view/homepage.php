<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../utils/ui_bricks/header.php';
require_once __DIR__ . '/../utils/ui_bricks/footer.php';

$header = new Header(title: SITE_NAME, lang: Language::FRENCH->value, stylesheet: BASE_URL . '/assets/style.css');
$header->render();

?>

<header>
    <?php if (isset($_SESSION['login'])) : ?>
        <a href="/logout">Se déconnecter</a>
        <a href="/profile">Votre profile</a>
    <?php else : ?>
        <a href="/login">Se connecter</a>
        <a href="/subscribe">Inscription</a>
    <?php endif; ?>
</header>

<?php
$footer = new Footer(copyrightText: "StackGame", year: 2026, className: "site-footer");
$footer->render();
?>
