<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../utils/ui_bricks/header.php';
require_once __DIR__ . '/../utils/ui_bricks/footer.php';
require_once __DIR__ . '/../utils/ui_bricks/NavItem.php';

$header = new Header(title: SITE_NAME, lang: Language::FRENCH->value, stylesheet: BASE_URL . '/assets/style.css', showTitle: false);
$header->render();

$navbar = new Navbar("navbar");
$navbar->addItem(new NavItem("/", "Accueil"));
if (isset($_SESSION['user_id'])) {
    $navbar->addItem(new NavItem("/logout", "Se déconnecter"));
}
?>

<header>
    <?php Header::renderBrand(); ?>
    <?php $navbar->render(); ?>
</header>

<main>
    <h1>Votre profil : <?= htmlspecialchars($user['firstname']) ?></h1>
</main>

<?php
$footer = new Footer(copyrightText: "StackGame", year: 2026, className: "site-footer");
$footer->render();
?>
