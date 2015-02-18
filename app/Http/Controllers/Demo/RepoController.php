<?php namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use App\Contracts\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Logging\Log;

class RepoController extends Controller {

    /**
     * Logger.
     *
     * @var \Illuminate\Log\Writer;
     */
    protected $log;

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
    public function __construct(Log $log, UserRepositoryInterface $user)
    {
        $this->log = $log;

        $this->user = $user;
    }

    /**
     * Demo index.
     *
     * @return mixed
     */
    public function getIndex()
    {
        $methods = get_class_methods($this->user);

        var_dump(\App::environment(), $methods);

        $this->log->info('methods', $methods);
    }

}
