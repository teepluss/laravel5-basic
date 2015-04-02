<?php namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\Exceptions\ValidateException;

use Teepluss\Restable\Contracts\Restable;

class UsersController extends Controller {

    /**
     * User repository.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $user;

    /**
     * Controller construct.
     *
     * @param Log                     $log
     * @param UserRepositoryInterface $user
     */
    public function __construct(UserRepository $user, Restable $rest)
    {
        $this->user = $user;

        $this->rest = $rest;
    }

    public function index()
    {
        $users = $this->user->with(['podcasts'])->all();

        //return \Restable::listing($users)->render('json');
        return $this->rest->listing($users)->render('json');
    }

    /**
     * @api {get} /users/:id Request User information
     * @apiName GetUser
     * @apiGroup User
     *
     * @apiParam {Number} id Users unique ID.
     * @apiParam {Number} no Users number.
     *
     * @apiSuccess {String} firstname Firstname of the User.
     * @apiSuccess {String} lastname  Lastname of the User.
     */
    public function show($id)
    {
        $user = $this->user->find($id);

        return $user;
    }

}