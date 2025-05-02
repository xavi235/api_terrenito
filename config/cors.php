<?php

return [

    'paths' => ['api/*', 'storage/*'], // Acceso a endpoints API y almacenamiento

    'allowed_methods' => ['*'], // Permitir todos los métodos (GET, POST, etc.)

    'allowed_origins' => [
        'https://api-terrenito.onrender.com', // Producción (ajusta si tu frontend tiene otro dominio)
    ],

    'allowed_origins_patterns' => [
        '^http:\/\/localhost:\d+$', // Cualquier puerto en localhost (útil para desarrollo Flutter o web local)
    ],

    'allowed_headers' => ['*'], // Permitir todos los headers

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false, // Cambia a true si usas cookies/autenticación basada en sesión
];
