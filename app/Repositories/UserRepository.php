<?php namespace App\Repositories;

use App\Models\User;
use Robbo\Presenter\Presenter;
use Prettus\Repository\Eloquent\Repository;
use Prettus\Repository\Criteria\RequestCriteria;

use Validator;

class UserRepository extends Repository {

    protected $fieldSearchable = [
        'name' => 'like',
        'email'
    ];

    /**
     * @var Robbo\Presenter\Presenter
     */
    //protected $presenter = 'App\Repositories\Presenters\User\UserPresenter';

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function boot()
    {
        // Default criteria
        $this->pushCriteria(new Criterias\User\MyCriteria());

        // Searchable criteria
        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $this->pushMutatorBeforeAll(new Mutators\User\UserAttributeMutator());
    }

    public function create(array $attributes)
    {
        $v = Validator::make($attributes, [
            'name'  => 'required',
            'email' => 'required'
        ]);

        $v->after(function($v) use ($attributes)
        {
            if (preg_match('/@/', $attributes['name']))
            {
                $v->errors()->add('name', 'Something is wrong with this name!');
            }
        });

        if ($v->fails())
        {
            throw new Exceptions\ValidateException($v);
        }

        // Another logic, another exception.
        // if (preg_match('/@/', $attributes['name']))
        // {
        //     throw new Exceptions\User\InvalidNameFormatException('Your name is content invalid character.');
        // }

        return parent::create($attributes);
    }

}
