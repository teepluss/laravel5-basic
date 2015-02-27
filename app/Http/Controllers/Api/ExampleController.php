<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ExampleController extends Controller {

    public function index()
    {
        return [
            ['id' => 1, 'nmae' => 'A'],
            ['id' => 2, 'name' => 'B']
        ];
    }

}