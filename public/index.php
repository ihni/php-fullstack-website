<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include TEMPLATES_PATH . '/landing.php';