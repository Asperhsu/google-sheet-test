<?php
require __DIR__ . '/vendor/autoload.php';

// base dir
$baseDir = __DIR__ . '/';
putenv('BASE_DIR=' . $baseDir);

// dotenv
$dotenv = new Dotenv\Dotenv($baseDir);
$dotenv->load();

// debug
ini_set('display_errors', getenv('APP_DEBUG') ? 1 : 0);

// google credentials
putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $baseDir . getenv('GOOGLE_APPLICATION_CREDENTIALS'));
