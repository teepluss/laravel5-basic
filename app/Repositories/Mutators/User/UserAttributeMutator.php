<?php namespace App\Repositories\Mutators\User;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Mutator;

use Hash;

class UserAttributeMutator implements Mutator {

    public function transform(Model $model)
    {
        $password = Hash::make($model->attributes['password']);

        $model->setAttribute('password', $password);

        return $model;
    }

}
