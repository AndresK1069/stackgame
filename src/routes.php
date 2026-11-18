<?php
return [
    'GET' => [
        '/' => ['UserController', 'index'],
        '/login' => ['UserController', 'showLogin'],
        '/logout' => ['UserController', 'submitLogout'],
        '/subscribe' => ['UserController', 'showSubscribe'],
    ],
    'POST' => [
        '/login' => ['UserController', 'submitLogin'],
        '/subscribe' => ['UserController', 'submitSubscribe'],
    ],
];
?>
