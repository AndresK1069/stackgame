<?php

$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
$path     = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (strcasecmp($path, $basePath . '/index.php') === 0) {
    header('Location: ' . $basePath . '/', true, 302);
    exit;
}

define('STACKGAME_ENTRY', true);

require_once __DIR__ . '/../router.php';

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../utils/core_bricks/utils.php';

require_once __DIR__ . '/../utils/ui_bricks/header.php';
require_once __DIR__ . '/../utils/ui_bricks/footer.php';

require_once __DIR__ . '/../controller/pdo.php';
require_once __DIR__ . '/../controller/userController.php';

require_once __DIR__ . '/../model/UserModel.php';


$routes = require __DIR__ . '/../routes.php';
$pdo = create_pdo();

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($basePath !== '' && ($requestPath === $basePath || strncmp($requestPath, $basePath . '/', strlen($basePath) + 1) === 0)) {
    $requestPath = substr($requestPath, strlen($basePath)) ?: '/';
}

$router = new Router($routes, $pdo);
$router->dispatch($_SERVER['REQUEST_METHOD'], $requestPath);
