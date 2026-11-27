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

    <main>
        <h1>Statistiques d'utilisation</h1>

        <table>
            <thead>
            <tr>
                <th>utilisateur</th>
                <th>nombre de jeux joués</th>
                <th>nombre de jeux résolus</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <table>
            <thead>
            <tr>
                <th>jeu</th>
                <th>nombre de fois joué</th>
                <th>nombre de fois résolu</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </main>

<?php
$footer = new Footer(copyrightText: "StackGame", year: 2026, className: "site-footer");
$footer->render();
?>