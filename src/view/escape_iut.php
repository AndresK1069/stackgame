<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../utils/ui_bricks/header.php';
require_once __DIR__ . '/../utils/ui_bricks/footer.php';
require_once __DIR__ . '/../utils/ui_bricks/NavItem.php';

$cssUrl = BASE_URL . '/assets/style.css?v=' . filemtime(__DIR__ . '/../public/assets/style.css');
$jsUrl  = BASE_URL . '/assets/js/escape_iut.js?v=' . filemtime(__DIR__ . '/../public/assets/js/escape_iut.js');

$header = new Header(title: SITE_NAME, lang: Language::FRENCH->value, stylesheet: $cssUrl, showTitle: false);
$header->addElement('<script src="' . $jsUrl . '" defer></script>');
$header->render();

$navbar = new Navbar("navbar");
$navbar->addItem(new NavItem("/", "Accueil"));
$navbar->addItem(new NavItem("/logout", "Se déconnecter"));
?>

<header>
    <?php Header::renderBrand(); ?>
    <?php $navbar->render(); ?>
</header>

<main class="escape-game">
    <h2>Sortir de l'IUT</h2>
    <p class="description">
        Tu viens d'entrer à l'IUT, mais les accès sont verrouillés. Clique sur les bâtiments du plan
        pour ouvrir chaque énigme et résous-les toutes dans le temps imparti pour sortir.
    </p>

    <p class="escape-progress">Énigmes résolues : <strong id="progression">0 / 8</strong></p>

    <div class="escape-layout">
        <div class="escape-plan">
            <img src="<?= BASE_URL ?>/assets/plan_iut.png" alt="Plan de l'IUT" usemap="#plan-iut">
            <map name="plan-iut">
                <area shape="rect" coords="240,78,360,230" href="<?= BASE_URL ?>/enigme?zone=ba1" alt="BA1 - GARROS" data-zone="ba1">
                <area shape="rect" coords="234,254,356,381" href="<?= BASE_URL ?>/enigme?zone=ba2" alt="BA2 - BOUCHER" data-zone="ba2">
                <area shape="rect" coords="362,90,725,290" href="<?= BASE_URL ?>/enigme?zone=ba3" alt="BA3 - BASTIE" data-zone="ba3">
                <area shape="rect" coords="73,384,220,465" href="<?= BASE_URL ?>/enigme?zone=ba4" alt="BA4 - ST EXUPERY" data-zone="ba4">
                <area shape="rect" coords="481,343,670,429" href="<?= BASE_URL ?>/enigme?zone=ba5" alt="BA5 - MERMOZ" data-zone="ba5">
                <area shape="circle" coords="410,430,55" href="<?= BASE_URL ?>/enigme?zone=ba6" alt="BA6 - BLERIOT" data-zone="ba6">
                <area shape="rect" coords="576,506,655,530" href="<?= BASE_URL ?>/enigme?zone=ba7" alt="BA7 - ANCIENNE LOGE GARDIEN" data-zone="ba7">
                <area shape="rect" coords="223,463,347,521" href="<?= BASE_URL ?>/enigme?zone=ba8" alt="BA8 - MODULAIRES" data-zone="ba8">
            </map>
        </div>
    </div>

    <div id="victoire" class="escape-victory" hidden>
        <h3>Bravo, tu as réussi à sortir de l'IUT !</h3>
        <p>Toutes les zones ont été explorées et toutes les énigmes ont été résolues.</p>
    </div>

    <dialog id="enigme-dialog" class="escape-dialog" aria-labelledby="enigme-dialog-title">
        <div class="escape-dialog-bar">
            <h2 id="enigme-dialog-title">Énigme en cours</h2>
            <button type="button" id="enigme-close" class="escape-close" aria-label="Fermer l'énigme">Fermer</button>
        </div>
        <iframe id="enigme-frame" name="enigme-frame" src="about:blank" title="Zone d'énigme"></iframe>
    </dialog>
</main>

<?php
$footer = new Footer(copyrightText: "StackGame", year: 2026, className: "site-footer");
$footer->render();
?>
