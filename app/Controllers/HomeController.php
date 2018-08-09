<?php

namespace App\Controllers;

use App\Services\SpreadSheet;

class HomeController
{
    public function index()
    {
        echo 'hello word';
    }

    public function test()
    {
        $speadSheet = new SpreadSheet();
        $result = $speadSheet->insert([
            'a', 'b'
        ]);

        echo '<pre>' . print_r($result, true) . '</pre>';
    }
}
