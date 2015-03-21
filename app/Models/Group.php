<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

    /**
     * Relation between group and user.
     *
     * @return Collection
     */
    public function groups()
    {
        return $this->belongsToMany('App\Models\User', 'user_groups');
    }

    /**
     * Permission as array.
     *
     * @param  array $permissions
     * @return array
     */
    public function getPermissionsAttribute($permissions)
    {
        return ($permissions) ? json_decode($permissions, true) : null;
    }

}