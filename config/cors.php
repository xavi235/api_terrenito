<?php

return [

    'paths' => ['api/*', 'storage/*'], // Esto permite el acceso a los endpoints API y almacenamiento
    
    'allowed_methods' => ['*'], // Permite todos los métodos HTTP (GET, POST, etc.)
    
    'allowed_origins' => ['http://localhost:37499'], // Permite solicitudes solo desde http://localhost:37499
    
    'allowed_origins_patterns' => [],
    
    'allowed_headers' => ['*'], // Permite todos los encabezados
    
    'exposed_headers' => [],
    
    'max_age' => 0,
    
    'supports_credentials' => false,
];
