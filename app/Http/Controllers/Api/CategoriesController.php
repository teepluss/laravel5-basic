<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class CategoriesController extends Controller {

    protected $Categories = [];

    public function __construct()
    {
        $this->categories = [
            'categories' => [
                ['id' => 1, 'title' => 'One'],
                ['id' => 2, 'title' => 'Two']
            ]
        ];
    }

    public function index()
    {
        return $this->categories;
    }

    public function show($id)
    {
        return current($this->categories['categories']);
    }

}