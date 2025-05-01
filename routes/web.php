<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

Route::get('/imagenes/{filename}', function ($filename) {
    $path = storage_path('app/public/imagenes/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    $mimeType = mime_content_type($path);
    $headers = [
        'Content-Type' => $mimeType,
        'Access-Control-Allow-Origin' => '*', // o tu dominio específico
    ];

    return response()->file($path, $headers);
});
