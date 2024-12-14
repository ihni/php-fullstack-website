<?php

namespace App\Core;

class Redirect {
    public static function to($url) {
        require_once __DIR__ . '/../../config/config.php';

        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $redirectUrl = $url; // Absolute URL
        } else {
            $redirectUrl = rtrim(BASE_URL, '/') . '/' . ltrim($url, '/'); // Use BASE_URL
        }

        header('Location: ' . $redirectUrl);
        exit();
    }
}