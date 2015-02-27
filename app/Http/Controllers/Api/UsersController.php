<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class UsersController extends Controller {

    protected $users = [];

    public function __construct()
    {
        $this->users = [
            'users' => [
                ['id' => 1, 'username' => 'Teepluss', 'lastname' => 'Pluss', 'name' => 'Tee'],
                ['id' => 2, 'username' => 'MinieGirlzaa', 'lastname' => 'Girlzaa', 'name' => 'Minie'],
            ]
        ];
    }

    public function index()
    {
        return $this->users;
    }

    public function show($id)
    {
        return current($this->users['users']);
    }

}