<?php namespace App\Http\Controllers\Demo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Exceptions\ValidateException;

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
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Get all entries.
     *
     * @return mixed
     */
    public function getIndex()
    {
        $users = $this->user->skipPresenter()->with(['podcasts'])->all();

        return $users;
    }

    /**
     * Form create.
     *
     * @return string
     */
    public function getCreate()
    {
        return view('demo.users.create');
    }

    /**
     * Store user.
     *
     * @param  Request $request
     * @return void
     */
    public function postCreate(Request $request)
    {
        try
        {
            $input = $request->only('name', 'email', 'password');

            $this->user->create($input);
        }
        catch (\Exception $e)
        {
            if ($e instanceof ValidateException) {
                return redirect()->back()->withErrors($e->get());
            }
            else {
                trigger_error('What the fuck is going on?');
            }
        }

        return redirect()->back()->withSuccess('Yes, You have got a new user.');
    }

}