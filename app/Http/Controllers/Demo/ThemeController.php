<?php namespace App\Http\Controllers\Demo;

use Teepluss\Theme\Contracts\Theme;
use App\Http\Controllers\Controller;

class ThemeController extends Controller {

    public function __construct(Theme $theme)
    {
        $this->theme = $theme->uses('default')->layout('mobile');
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
