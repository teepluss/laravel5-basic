<?php namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Theme;

class ThemeController extends Controller {

    public function __construct()
    {
        $this->theme = Theme::uses('default')->layout('mobile');
    }

    public function getIndex()
    {
        $data = [
            'name'  => 'Tee',
            'email' => 'teepluss@gmail.com'
        ];

        return $this->theme->of('demo.theme.index', $data)->render();
    }

}
