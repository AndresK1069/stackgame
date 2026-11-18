<?php
return [
    'GET' => [
        '/' => ['UserController', 'index'],
        '/login' => ['UserController', 'showLogin'],
        '/logout' => ['UserController', 'submitLogout'],
        '/subscribe' => ['UserController', 'showSubscribe'],
        '/profile' => ['UserController', 'showProfile'],
    ],
    'POST' => [
        '/login' => ['UserController', 'submitLogin'],
        '/subscribe' => ['UserController', 'submitSubscribe'],
    ],
];
?>
