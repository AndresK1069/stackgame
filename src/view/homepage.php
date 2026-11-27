<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../utils/ui_bricks/header.php';
require_once __DIR__ . '/../utils/ui_bricks/footer.php';
require_once __DIR__ . '/../utils/ui_bricks/NavItem.php';

$header = new Header(title: SITE_NAME, lang: Language::FRENCH->value, stylesheet: BASE_URL . '/assets/style.css', showTitle: false);
$header->render();

$navbar = new Navbar("navbar");

if (isset($_SESSION['user_id'])) {
    $navbar->addItem(new NavItem("/logout", "Se déconnecter"));
    $navbar->addItem(new NavItem("/profile", "Votre profile"));
    $navbar->addItem(new NavItem("/escape-iut", "Escape Game IUT"));
} else {
    $navbar->addItem(new NavItem("/login", "Se connecter"));
    $navbar->addItem(new NavItem("/subscribe", "Inscription"));
}
?>

    <header>
        <?php Header::renderBrand(); ?>
        <?php $navbar->render(); ?>
    </header>

<main>
    <section class="hero">
        <img class="hero-logo" src="<?= LOGO_URL ?>" width="160" height="160" alt="Logo <?= htmlspecialchars(SITE_NAME) ?>">
        <h1><?= htmlspecialchars(SITE_NAME) ?></h1>
        <p class="description">Jeux, défis et énigmes : relève-les tous.</p>
    </section>

<?php if (isset($_SESSION['user_id'])): ?>
    <h3>Voici nos jeux disponibles :</h3>
    <ul>
        <li><a href="/escape-iut">Lancer le mini escape game (Plan de l'IUT)</a></li>
    </ul>
<?php else: ?>
    <p class="hero-cta">
        <a class="classic-button" href="/login">Se connecter</a>
        <a class="classic-button classic-button-secondary" href="/subscribe">Créer un compte</a>
    </p>
<?php endif; ?>
</main>

<?php
$footer = new Footer(copyrightText: "StackGame", year: 2026, className: "site-footer");
$footer->render();
?>