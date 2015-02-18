<?php namespace App\Bootstrap;

use Dotenv;
use InvalidArgumentException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Bootstrap\DetectEnvironment as BaseDetectEnvironment;

class DetectEnvironment extends BaseDetectEnvironment {

    /**
     * Bootstrap the given application.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function bootstrap(Application $app)
    {
        // You can use your logic here!
        $app->detectEnvironment(function()
        {
            return 'something';
        });

        // You need to remove or comment this line,
        // if you have logic self.
        parent::bootstrap($app);
    }

}