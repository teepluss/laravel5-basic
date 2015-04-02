<?php namespace App\Repositories\Presenters\User;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract {

    public function transform(User $user)
    {
        return $user;
    }

}