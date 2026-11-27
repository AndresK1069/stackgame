<?php
return [
    'GET' => [
        '/' => ['UserController', 'index'],
        '/login' => ['UserController', 'showLogin'],
        '/logout' => ['UserController', 'submitLogout'],
        '/subscribe' => ['UserController', 'showSubscribe'],
        '/profile' => ['UserController', 'showProfile'],
        '/captcha' => ['UserController', 'createCaptcha'],
    ],
    'POST' => [
        '/login' => ['UserController', 'submitLogin'],
        '/subscribe' => ['UserController', 'submitSubscribe'],
    ],
];
?>
