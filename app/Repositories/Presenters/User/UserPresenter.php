<?php namespace App\Rositories\Presenters\User;

use Robbo\Presenter\Presenter;

class UserPresenter extends Presenter {

    /**
     * URL
     *
     * eg. $this['url'], $this->url
     *
     * @return string
     */
    public function presentUrl()
    {
        return 'http://avatar.io/'.$this->id.'-'.$this->name;
    }

    /**
     * URL
     *
     * eg. $this->url()
     *
     * @return string
     */
    public function url()
    {
        return 'http://avatar.io';
    }

}