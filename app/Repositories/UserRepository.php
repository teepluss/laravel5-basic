<?php namespace App\Repositories;

use App\Models\User;
use Robbo\Presenter\Presenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Validation\Factory as Validator;
use Illuminate\Container\Container as Application;
use App\Repositories\Contracts\UserRepository as UserRepositoryContract;

class UserRepository extends BaseRepository implements UserRepositoryContract {

    protected $fieldSearchable = [
        'name' => 'like',
        'email'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return "App\\Models\\User";
    }

    /**
     * Specify Presenter class name
     *
     * @return mixed
     */
    public function presenter()
    {
        return "App\\Repositories\\Presenters\\User\\UserPresenter";
    }

    public function boot()
    {
        // Default criteria
        $this->pushCriteria(new Criterias\User\MyCriteria());

        // Searchable criteria
        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }

    public function create(array $attributes)
    {
        $v = $this->app['validator']->make($attributes, [
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
