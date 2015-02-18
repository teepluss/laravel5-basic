<?php namespace App\Repositories;

use App\User;
use App\Contracts\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($data)
    {
        return $this->user->create($data);
    }

    /**
     * @param int   $take
     * @param array $scopes
     * @return \Illuminate\Pagination\Paginator
     */
    public function getCollection($take = 5, $scopes = [])
    {

    }

    /**
     * @param array $ids
     * @param int   $take
     * @param array $scopes
     * @return \Illuminate\Pagination\Paginator
     */
    public function getSubset(array $ids = [], $take = 5, $scopes = [])
    {

    }

    /**
     * @param  int $id
     * @return \App\Models\BaseModel
     */
    public function getItem($id)
    {

    }

    /**
     * @return \App\Contracts\DataProviders\BaseDataProviderInterface
     */
    public function getDataProvider()
    {

    }

}
