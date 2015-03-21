<?php namespace App\Repositories\Criterias\User;

use Prettus\Repository\Contracts\Criteria;
use Prettus\Repository\Contracts\Repository;

class MyCriteria implements Criteria {

    public function apply($query, Repository $repository)
    {
        $query = $query->whereNotNull('email');

        return $query;
    }
}