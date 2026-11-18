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
    <?php endif; ?>
</header>

<main>
    <header>
        <a href="/logout">Se déconnecter</a>
    </header>

    <h1>Votre profil : <?= htmlspecialchars($user['firstname']) ?></h1>
</main>

<?php
$footer = new Footer(copyrightText: "StackGame", year: 2026, className: "site-footer");
$footer->render();
?>
