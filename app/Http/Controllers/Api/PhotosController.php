<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class PhotosController extends Controller {

    protected $photos = [];

    public function __construct()
    {
        $this->photos = [
            'photos' => [
                ['id' => 1, 'title' => 'One'],
                ['id' => 2, 'title' => 'Two']
            ]
        ];
    }

    public function index()
    {
        return $this->photos;
    }

    public function show($id)
    {
        return current($this->photos['photos']);
    }

}