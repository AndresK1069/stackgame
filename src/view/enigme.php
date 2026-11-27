<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../utils/ui_bricks/header.php';

$cssUrl = BASE_URL . '/assets/style.css?v=' . filemtime(__DIR__ . '/../public/assets/style.css');
$jsUrl  = BASE_URL . '/assets/js/enigme.js?v=' . filemtime(__DIR__ . '/../public/assets/js/enigme.js');

$header = new Header(
    title: SITE_NAME,
    lang: Language::FRENCH->value,
    stylesheet: $cssUrl,
    showTitle: false
);
$header->addElement('<script src="' . $jsUrl . '" defer></script>');
$header->render();
?>

<main id="enigme" class="enigme" data-zone="<?= htmlspecialchars($zone) ?>">
    <p class="enigme-timer">Temps restant : <span id="timer">30</span> s</p>
    <h2 id="titre-zone">Zone</h2>
    <p id="question"></p>

    <form id="form-enigme">
        <input type="text" id="reponse" placeholder="Ex: 4 et -3" autocomplete="off" required>
        <button type="submit" id="btn-valider">Valider</button>
        <button type="button" id="btn-retry">Recommencer</button>
    </form>

    <p class="enigme-msg" id="message"></p>
</main>

</body>
</html>
