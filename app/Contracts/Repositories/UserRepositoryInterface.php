<?php namespace App\Contracts\Repositories;

interface UserRepositoryInterface {

    /**
     * @param int   $take
     * @param array $scopes
     * @return \Illuminate\Pagination\Paginator
     */
    public function getCollection($take = 5, $scopes = []);

    /**
     * @param array $ids
     * @param int   $take
     * @param array $scopes
     * @return \Illuminate\Pagination\Paginator
     */
    public function getSubset(array $ids = [], $take = 5, $scopes = []);

    /**
     * @param  int $id
     * @return \App\Models\BaseModel
     */
    public function getItem($id);

    /**
     * @return \App\Contracts\DataProviders\BaseDataProviderInterface
     */
    public function getDataProvider();

}