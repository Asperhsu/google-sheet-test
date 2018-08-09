<?php
require '../bootstrap.php';
use App\Services\SpreadSheet;

$speadSheet = new SpreadSheet();

$result = $speadSheet->insert([
    'a', 'b'
]);

echo '<pre>' . print_r($result, true) . '</pre>';
