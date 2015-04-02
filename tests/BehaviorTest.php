<?php

use Laracasts\Integrated\Extensions\Laravel as IntegrationTest;

class BehaviorTest extends IntegrationTest {

    protected $baseUrl = 'http://50.laravel.app';

    /** @test */
    public function it_verifies_that_pages_load_properly()
    {
        $this->visit('/')
             ->andSee('Laravel 5');
    }

}