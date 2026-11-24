<?php
return [
    'GET' => [
        '/' => ['UserController', 'index'],
        '/login' => ['UserController', 'showLogin'],
        '/logout' => ['UserController', 'submitLogout'],
        '/subscribe' => ['UserController', 'showSubscribe'],
        '/profile' => ['UserController', 'showProfile'],
        '/escape-iut' => ['UserController', 'showEscapeGame'],
    ],
    'POST' => [
        '/login' => ['UserController', 'submitLogin'],
        '/subscribe' => ['UserController', 'submitSubscribe'],
    ],
];
?>
