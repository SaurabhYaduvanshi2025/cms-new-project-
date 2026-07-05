<?php

declare(strict_types=1);

// Composer Autoload
require_once __DIR__ . '/../vendor/autoload.php';

// Load .env File
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// Set Default Timezone
date_default_timezone_set('Asia/Kolkata');
