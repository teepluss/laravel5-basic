<?php namespace App\Composers;

use Illuminate\Contracts\View\View;

class CartComposer {

    public function compose(View $view)
    {
        $view->x = 'Wooof';
    }

}

