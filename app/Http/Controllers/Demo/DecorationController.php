<?php namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

class DecorationController extends Controller {

    public function getIndex()
    {
        return view('demo.decoration.index');
    }

}