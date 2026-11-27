<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../utils/ui_bricks/header.php';
require_once __DIR__ . '/../utils/ui_bricks/footer.php';
require_once __DIR__ . '/../utils/ui_bricks/NavItem.php';
$header = new Header(title: SITE_NAME, lang: Language::FRENCH->value, stylesheet: BASE_URL . '/assets/style.css', showTitle: false);
$header->render();

$navbar = new Navbar("navbar");
$navbar->addItem(new NavItem("/logout", "Se déconnecter"));
?>

    <header>
        <?php Header::renderBrand(); ?>
        <?php $navbar->render(); ?>
    </header>

    <main style="max-width: 800px; margin: 40px auto; padding: 0 20px;">
        <h2>Live Updates</h2>
        <div id="content" style="background: #1e1e1e; color: #00ff00; padding: 15px; border-radius: 5px; font-family: monospace; min-height: 100px;">
            Loading...
        </div>
    </main>

<?php
$footer = new Footer(copyrightText: "StackGame", year: 2026, className: "site-footer");
$footer->render();
?>