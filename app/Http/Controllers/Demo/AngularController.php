<?php namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

class AngularController extends Controller {

    public function getIndex()
    {
        return view('demo.angular.index');
    }

}
