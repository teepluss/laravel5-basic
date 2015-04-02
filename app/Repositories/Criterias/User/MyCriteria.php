<?php namespace App\Repositories\Criterias\User;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class MyCriteria implements CriteriaInterface {

    public function apply($query, RepositoryInterface $repository)
    {
        $query = $query->whereNotNull('email');

        return $query;
    }
}